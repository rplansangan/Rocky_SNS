<?php namespace SNS\Libraries\Services;

use SNS\Models\UserFriends;
use SNS\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class FriendService {
	
	/**
	 * SNS\Models\UserFriends;
	 * @var unknown
	 */
	protected $list;
	
	/**
	 * SNS\Models\FriendRequest;
	 * status = 0 -> request sent
	 * status = 1 -> request ignored
	 * status = 2 -> request cancelled by user
	 * status = 9 -> request ack
	 * @var unknown
	 */
	protected $request;
	
	/**
	 * Friend list and request status
	 * @var array
	 */
	protected $status;
	
	public function __construct() {
		$this->list = new UserFriends();
		
		$this->request = new FriendRequest();
	}
	
	/**
	 * Returns false if user has not added <requested_id>
	 * @param integer $requested_id
	 * @return boolean
	 */
	protected function listCheck($requested_id) {
		$q = $this->list
				->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)->get();
		return !$q->isEmpty();
	}
	
	/**
	 * Returns false if <requested_id> has not set 9/acknowledged user request
	 * @param integer $requested_id
	 * @return boolean
	 */
	protected function reqCheck($requested_id) {
		$q = $this->request
				->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)
				->whereNotIn('status', array(2, 9))->latest()->take(1)->get();
		return !$q->isEmpty();		
	}
	
	/**
	 * Checks if authenticated user has added user with the given id
	 *
	 * @param integer $requested_id
	 * @return array
	 */
	public function check($requested_id) {
		$response['is_friend'] = $this->listCheck($requested_id);
		$response['request'] = $this->reqCheck($requested_id);
		
		$this->status = $response;

		return $this;
	}
	
	/**
	 * Gets request status
	 * @return array
	 */
	public function friendRequest() {
		return $this->status['request'];
	}
	
	/**
	 * Gets is_friend status
	 * @return boolean
	 */
	public function isFriend() {
		return $this->status['is_friend'];
	}
	
	/**
	 * Checks status property if a new friend request can be sent
	 * @return boolean
	 */
	protected function allowRequest() {
		// is_friend and request should be false so a friend request can be sent
		if(!$this->status['is_friend'] AND !$this->status['request']){
			return true;
		} 
		return false;
	}
	
	/**
	 * Checks for a previous request where status != 9
	 * @param unknown $requested_id
	 */
	protected function previousRequest($requested_id) {
		$q = $this->request
				->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)
				->whereNotIn('status', array(9))->get();
		
		if(!$q->isEmpty()) {
			foreach($q as $single) {
				$single->delete();
			}
		}
	}
	
	/**
	 * Sends a friend request to the requested user id if not on the friend list and/or request sent
	 * @param integer $requested_id
	 * @return boolean
	 */
	public function add($requested_id) {
		$this->check($requested_id);
		
		if($this->allowRequest()) {
			// check first for a previous request just to avoid any error later on
			$this->previousRequest($requested_id);
			
			$this->request->create(array(
					'request_message' => 'from user ' . Auth::user()->registration->registration_id,
					'requesting_user_id' => Auth::user()->registration->registration_id,
					'requested_user_id'	=> $requested_id,
					'status' => 0
			));
			return true;
		}		
		return false;
	}
	
	/**
	 * Updates a friend request record
	 * @param integer $requested_id
	 * @param integer $status
	 */
	public function fromRequest($requested_id, $status) {
		$req = $this->request
		->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)
		->update(array('status' => $status));
		
		// soft delete record so it won't cause an error during checking process
		$req->delete();
	}
	
	/**
	 * 
	 * @param integer $user_id
	 * @return Illuminate\Support\Collection
	 */
	public function collect($user_id) {
		return $this->list->where('user_id', $user_id)
				->with(array('profile' => function($q) {
					$q->addSelect(array('registration_id', 'last_name', 'first_name'));
				}))->get();
	}
}