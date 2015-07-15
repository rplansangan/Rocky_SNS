<?php namespace SNS\Http\Controllers;

use Carbon\Carbon;
use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Libraries\Traits\ProfPicTrait;
use SNS\Models\Images;
use SNS\Models\User;
use SNS\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;
use Illuminate\Support\Facades\DB;
use SNS\Libraries\Cache\Set;

class ProfileController extends Controller {
	
	use ProfPicTrait;
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
		
	}
	
	public function showProfile($id){ 	   
		$profileInformation = Registration::with('prof_pic')->where('user_id' , $id)->get();
		$data['profileInformation'] = $profileInformation[0];
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.profile.profile';
		$data['newsfeed'] = PostService::incrementalNewsFeed(Auth::id() , 10 , $id);
		$data['id'] = $id;

		return view('pages.master', $data);		
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
	
	public function editProfile(Request $request, Set $cacheSet) {
		$input = array_except($request->all(), array('_token', 'userfile'));

		$user = Auth::user();
		$user->load('registration');
		
		$reg = $user->registration;
		while(($current = current($input)) !== false) {
			$key = key($input);
			$reg->$key = $current;	
			next($input);
		}
		$reg->save();

		$file = $request->file('userfile');

		if(isset($file)){
			try{
				$this->removePrevious($user->user_id);
				
				$filename = md5($file->getClientOriginalName() . $user->email_address . Carbon::now());
				$dir = StorageHelper::create($user->user_id);
				$mime = $file->getMimeType();
				
				$img = new Images([
						'is_profile_picture' => 1,
						'image_path' => $dir['front'],
						'image_name' => $filename,
						'image_mime' => $mime,
						'image_ext' => $file->getClientOriginalExtension()
					]);
				
				$reg->prof_pic()->save($img);
				
				$file->move(public_path() . $dir['root'] , $filename . '.' . $file->getClientOriginalExtension());
				$filePath = public_path() . $dir['root'] .'/'. $filename . '.' . $file->getClientOriginalExtension() ;
			}catch (\Exception $e) {
				DB::rollback();
				return trans('errors.err_500');
			}
		}
		
		$user->load([
				'prof_pic' => function($q) { 
						$q->where('pet_id', 0);
				}
		]);
		
		$cacheSet->updateUserData($user);
		DB::commit();
		echo 'Updated';
	}

	
	public function getSettingsView() {
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.profile.profilesettings';
		$data['title'] = 'Update Profile';
		$data['profile'] = Auth::user();
		$data['profile']->load(['registration']);
		return view('pages.master' , $data);
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
