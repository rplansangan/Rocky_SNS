<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Pets;
use SNS\Models\Business;
use SNS\Models\Images;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SNS\Libraries\Facades\StorageHelper;

class ProfileController extends Controller {
	
	public function __construct() {
		parent::__construct();
		$this->middleware('auth');
	}
	
	public function showProfile($id){ 
		$profileDetails = Registration::ofId($id)->with(array('prof_pic' => function($q) {
			$q->whereIsProfilePicture(1);
			$q->addSelect(array('image_id', 'user_id'));
		}))->get(); 
		$collection = PostService::initialNewsFeed(Auth::id(), $id);
		
		$data['friend_flags'] = FriendService::check($id);
		$data['include_scripts'] = true;
		return view('profile.profile', $data)
				->with('profile', $profileDetails[0])
				->with('posts', $collection);
	}

	public function petlist($id){
		$list = Pets::where('user_id', $id)->with('profile_pic')->get();
		$profileDetails = Registration::find($id); 
		return view('profile.petlist')
				->with('profile', $profileDetails)
				->with('list', $list);
	}
	
	public function showPetProfile($user_id, $pet_id) {
		$profileDetails = Pets::find($pet_id)->with(array('profile_pic' => function($query) use($pet_id) {
			$query->addSelect(array('image_id', 'user_id', 'pet_id'));
			$query->where('pet_id', $pet_id)->where('is_profile_picture', 1);
		}))->get();
		
		return view('profile.profilepet')->with('profile', $profileDetails[0]);
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
		return view('profile.settings')->with('details', Registration::find(auth()->id()));
	}
	
	public function editProfile(Request $request) {
		$input = array_except($request->all(), array('_token', 'userfile'));
		
		$reg = Registration::find(Auth::id());
		while(($current = current($input)) !== false) {
			$key = key($input);
			$reg->$key = $current;	
			next($input);
		}
		$reg->save();
		
		if($request->file('userfile') != null) {
			$file = $request->file('userfile');
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
				
			$img_data = new Images(array(
					'user_id' => $reg->registration_id,
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
}
