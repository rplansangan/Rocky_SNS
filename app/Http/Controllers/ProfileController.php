<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use SNS\Models\Pets;
use SNS\Models\Business;
use SNS\Models\Images;
use SNS\Models\User;
use SNS\Models\Registration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Libraries\Traits\ProfPicTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
	
	use ProfPicTrait;
	
	public function __construct() {
		parent::__construct();
		$this->middleware('auth');
	}
	
	public function showProfile($id){ 
		$profile = User::find($id);
		
		$profile->load(array('registration' => function($q) {
				$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
			}, 'prof_pic' => function($q) {
				$q->whereIsProfilePicture(1);
				$q->addSelect(array('image_id', 'user_id'));
			}
		));
		
		$collection = PostService::initialNewsFeed(Auth::id(), $id);
		
		$data['friend_flags'] = FriendService::check($id);
		$data['include_scripts'] = true;
		return view('profile.profile', $data)
				->with('profile', $profile)
				->with('posts', $collection);
		
		if($profile->is_foundation){

		}else{
				$profile->load(array('registration', 'prof_pic' => function($q) {
				$q->whereIsProfilePicture(1);
				$q->addSelect(array('image_id', 'user_id'));
				}));
				
				$collection = PostService::initialNewsFeed(Auth::id(), $id);
				
				$data['friend_flags'] = FriendService::check($id);
				$data['include_scripts'] = true;
				return view('profile.profile', $data)
						->with('profile', $profile)
						->with('posts', $collection);
		}
	}

	public function petlist($id){
		$list = Pets::select(array('pet_id', 'user_id', 'pet_name', 'breed', 'pet_bday', 'pet_gender', 'pet_type'))
						->where('user_id', $id)->with(array(
							'profile_pic' => function($q) {
								$q->addSelect('image_id', 'user_id', 'image_mime', 'pet_id');
								$q->where('is_profile_picture', 1);
							}
						))->get();
		
		$profile = User::find($id);
		
		$profile->load(array(
			'registration' => function($q) {
				$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
			}, 'prof_pic' => function($q) {
				$q->whereIsProfilePicture(1);
				$q->addSelect(array('image_id', 'user_id'));
			}
		));
		
		return view('profile.petlist')
				->with('profile', $profile)
				->with('list', $list);
	}
	
	public function showPetProfile($user_id, $pet_id) {
		$profileDetails = Pets::where('pet_id',$pet_id)->with(array(
				'profile_pic' => function($query) use($pet_id) {
					$query->addSelect(array('image_id', 'user_id', 'pet_id'));
					$query->where('pet_id', $pet_id)->where('is_profile_picture', 1);
				},
				'pet_food' => function($q) {
					$q->addSelect(array('id', 'brand_name'));
				},
				'pet_behavior' => function($q) {
					$q->addSelect(array('id', 'behavior'));
				}
			))->get();

		$newsfeed = PostService::initialNewsFeed(Auth::id(),$user_id);
		
		return view('profile.profilepet')->with('profile', $profileDetails[0])->with('newsfeed' , $newsfeed);
	}
	
	public function dispatchFriendRequest(Request $request) {
		switch($request->get('action')) {
			case 'add':
				$response['message'] = $this->addFriend($request->get('requested_id'));
				$response['action'] = 'req';
				break;		
// 			case 'req':
// 				$response['message'] = $this->cancelFriendReq($request->get('requested_id'));
// 				$response['action'] = 'add';
// 				break;
				
			case 'canc':
				$response['message'] = $this->deleteFriend($request->get('requested_id'));
				$response['action'] = 'add';
				break;
		}
		
		return json_encode($response);
	}
	
	protected function addFriend($requested_id) {
		if(FriendService::add($requested_id)) {
			return trans('profile.friend.is_pending');
		}
	}
	
	public function cancelFriendReq(Request $request) {
		FriendService::cancel($request->get('req_id'));
// 		return trans('profile.friend.add_friend');
	}
	
	protected function ignoreFriendReq(Request $request) {
		FriendService::ignore($request->get('req_id'));
		return redirect()->back();
	}
	
	public function acceptFriendRequest(Request $request) {
		FriendService::accept($request->get('req_id'));
		return redirect()->back();
	}
	
	public function deleteFriend($requested_id) {
		FriendService::delete($requested_id);
		return trans('profile.friend.add_friend');
	}
	
	public function userFriends($user_id) {
		$friends = FriendService::collect($user_id);
		return view('pages.friends_listing')
				->with('friends', $friends);
	}

	public function settings(){
		$details = User::find(Auth::id());
		$details->load('registration');
				
		return view('profile.settings')->with('details', $details->registration);
	}
	
	public function editProfile(Request $request) {
		$input = array_except($request->all(), array('_token', 'userfile'));
		
		$uid = User::find(Auth::id());
		$uid->load('registration');
		
		$reg = Registration::find($uid->registration->registration_id);
		while(($current = current($input)) !== false) {
			$key = key($input);
			$reg->$key = $current;	
			next($input);
		}
		$reg->save();
		
		if($request->file('userfile') != null) {
			// sets is_profile_pic field via ProfPicTrait
			$this->removePrevious(Auth::id());
			
			$file = $request->file('userfile');
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
				
			$img_data = new Images(array(
					'user_id' => $uid->user_id,
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension(),
					'is_profile_picture' => 1
			));
		
			$img_data->save();
		
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		
		return redirect()->back()->withInput($input);
	}

	public function profile_merchant($business_id ){
		$details = Business::find($business_id);
		
		return view('pages/merchantprofile')
				->with('details', $details);
	}

	
	public function getSettingsView() {
		return view('profile.user_settings');
	}
	
	public function getSettingsDispatcher(Request $request) {
		switch($request->get('action')) {
			case 'pw':
				return $this->changePassword(array_except($request->all(), array('_token', 'action')));
				break;
				
			default:
				return redirect()->back();
				break;
		}
	}
	
	private function changePassword($params) {
		$validate = Validator::make(array(
						'password' => $params['password'],
						'new_pass' => $params['new_password'],
						'new_pass_confirmation' => $params['new_password_confirmation']
				), array(
						'password' => 'required|min:6|max:24',
						'new_pass' => 'required|confirmed|min:6|max:24'
				), array(
						'password.required' => trans('profile.validation.password.required'),
						'password.min' => trans('profile.validation.password.min'),
						'password.max' => trans('profile.validation.password.max'),
						'new_pass.required' => trans('profile.validation.password.required'),
						'new_pass.min' => trans('profile.validation.password.min'),
						'new_pass.max' => trans('profile.validation.password.max'),
						'new_pass.confirmed' => trans('profile.validation.password.confirm')
				));
		
		if($validate->passes()) {
			$hash = Hash::check($params['password'], Auth::user()->password);
			
			if($hash == true) {
				User::find(Auth::id())->update(array('password' => Hash::make($params['new_password'])));
				return redirect()->back()->withErrors(array('message' => trans('profile.settings.password.changed')));
			} else {
				return redirect()->back()->withErrors(array('message' => trans('profile.settings.password.invalid')));
			}
		} else {
			return redirect()->back()->withErrors($validate->errors()->all());
		}
	}
}
