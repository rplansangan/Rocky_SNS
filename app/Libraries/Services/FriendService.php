<?php namespace SNS\Libraries\Services;

use SNS\Models\UserFriends;
use SNS\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
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
	 * status = 9 -> request ack
	 * @var unknown
	 */
	protected $request;
	
	public function __construct() {
		$this->list = new UserFriends();
		
		$this->request = new FriendRequest();
	}
	
	/**
	 * 
	 * @param integer $requested_id
	 * @return PHPUnit_Framework_Constraint_IsEmpty
	 */
	protected function listCheck($requested_id) {
		$q = $this->list->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)->get();
		return $q->isEmpty();
	}
	
	/**
	 * 
	 * @param integer $requested_id
	 * @return PHPUnit_Framework_Constraint_IsEmpty
	 */
	protected function reqCheck($requested_id) {
		$q = $this->request->ofUserWithReq(Auth::user()->registration->registration_id, $requested_id)->get();
		return $q->isEmpty();
	}
	
	/**
	 * Checks if authenticated user has added user with the given id
	 * return true if added and/or request sent
	 * @param integer $requested_id
	 * @return boolean
	 */
	public function check($requested_id) {		
		if($this->listCheck($requested_id) AND $this->reqCheck($requested_id)) {
			return false;
		}
		return true;
	}
	
	/**
	 * 
	 * @param integer $requested_id
	 * @return boolean
	 */
	public function add($requested_id) {
		if(!$this->check($requested_id)) {
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
	
	public function fromRequest($requested_id, $status) {
		
	}
}