<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Pets;
use SNS\Models\Business;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
	
// 	public function __construct() {
// 		parent::__construct();
// 	}

	public function showProfile($id){ 
		$profileDetails = Registration::find($id); 
		$collection = PostService::initialNewsFeed($id);
		
		$data['friend_flags'] = FriendService::check($id);
		$data['auth'] = true;
		return view('profile.profile' , $data)->with('profile', $profileDetails)->with('posts', $collection);
	}

	public function petlist($id){
		$list = Pets::where('user_id', $id)->with('profile_pic')->get();
		$profileDetails = Registration::find($id); 
		$data['auth'] = true;
		return view('profile.petlist' , $data)->with('profile', $profileDetails)->with('list', $list);
	}
	
	public function showPetProfile($user_id, $pet_id) {
		// don't know why this returns a collection obj instead of model
		$profileDetails = Pets::where('pet_id', $pet_id)->take(1)->with(array('profile_pic' => function($query) use($pet_id) {
			$query->where('pet_id', $pet_id);
		}))->get();
		
		$data['auth'] = true;
		return view('profile.profilepet', $data)->with('profile', $profileDetails[0]);
	}
	
	public function dispatchFriendRequest(Request $request) {
		switch($request->get('action')) {
			case 'add':
				$response['message'] = $this->addFriend($request->get('requested_id'));
				$response['action'] = 'req';
				break;		
			case 'req':
				$response['message'];
				$response['action'] = 'add';
				break;
				
			case 'canc':
				$response['message'] = $this->cancelFriendReq($request->get('requested_id'));
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

	public function settings(){
		$data['auth'] = true;
		return view('profile.settings' , $data);
	}

	public function profile_merchant($business_id ){
		$details = Business::find($business_id);
		return view('pages/merchantprofile')
				->with('details', $details);
	}
}
