<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Pets;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use Illuminate\Support\Facades\Auth;
use SNS\Events\FriendRequest;

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
				
				// Sends a notification to requested_id via FriendRequest event
				$response['test'] = event(new FriendRequest(array(
					'notification' => array(
							'params' => array(
								'origin' => 'Registration',
								'id' => Auth::user()->registration->registration_id,
							),
							'origin_user_id' => Auth::user()->registration->registration_id,
							'notification_object' => 'FriendRequest',
							'destination_user_id' => $request->get('requested_id'),
							'l10n_key' => 'profile.friend.request_msg')
					)));
				break;		
			case 'req':
				$response['message'];
				$response['action'] = 'add';
				break;
				
			case 'canc':
				$response['message'] = $this->cancelFriendReq($request->get('requested_id'));
				$response['action'] = 'add';
				break;
			case 'accept':
				$response['message'];
				$response['action'];
		}
		
		return json_encode($response);
	}
	
	protected function addFriend($requested_id) {
		if(FriendService::add($requested_id)) {
			return trans('profile.friend.is_pending');
		}
	}
	
	protected function cancelFriendReq($requested_id) {
		FriendService::fromRequest($requested_id, 2);
		return trans('profile.friend.add_friend');
	}

	public function settings(){
		$data['auth'] = true;
		return view('profile.settings' , $data);
	}
}
