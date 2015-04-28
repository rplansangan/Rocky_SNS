<?php namespace SNS\Libraries\Services;

use SNS\Models\UserFriends;
use SNS\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use SNS\Events\FriendRequest as FriendRequestEvent; 
use SNS\Libraries\Facades\Notification as Notification_Service;

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
	 * status = 3 -> request deleted by user
	 * status = 9 -> request ack
	 * @var unknown
	 */
	protected $request;
	
	/**
	 * Friend list and request status
	 * @var array
	 */
	protected $status;
	
	/**
	 * 
	 * @var array
	 */
	protected $ids = array();
	
	public function __construct() {
		$this->list = new UserFriends();
		
		$this->request = new FriendRequest();
		
		$this->ids['current'] = Auth::id();
	}
	
	/**
	 * Returns false if user has not added <requested_id>
	 * @param integer $requested_id
	 * @return boolean
	 */
	protected function listCheck() {
		$q = $this->list
				->select(array('user_id', 'friend_user_id'))
				->ofUserWithReq($this->ids['current'], $this->ids['requested'])->get();
		return !$q->isEmpty();
	}
	
	/**
	 * Returns false if <requested_id> has not set 9/ack user request
	 * @param integer $requested_id
	 * @return boolean
	 */
	protected function reqCheck() {
		$q = $this->request
				->select(array('requesting_user_id', 'requested_user_id'))
				->ofUserWithReq($this->ids['current'], $this->ids['requested'])
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
		$this->ids['requested'] = $requested_id;
				
		$this->status['is_friend'] = $this->listCheck();
		$this->status['request'] = $this->reqCheck();
		
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
	protected function previousRequest() {
		$q = $this->request
				->ofUserWithReq($this->ids['current'], $this->ids['requested'])
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
			$this->previousRequest();
			
			Notification_Service::origin('Registration', $this->ids['current'])
				->destinationId($this->ids['requested'])
				->params(array('notif_type' => 'friend_request'))
				->send();
			
			$this->request->create(array(
					'requesting_user_id' => $this->ids['current'],
					'requested_user_id'	=> $this->ids['requested'],
					'status' => 0
			));
			return true;
		}		
		return false;
	}
	
	public function ignore($requested_id) {
		$this->ids['requested'] = $requested_id;
		
		$this->updateRequest(array(
				'requesting_id' => $this->ids['requested'],
				'requested_id' => $this->ids['current']
		), 1);
		
		Notification_Service::setIsRead(
			'SNS\Models\User',
			$this->ids['current'],
			$this->ids['requested'],
			array('friend_ignore' => true)
		);
	}
	
	public function cancel($requested_id) {
		$this->ids['requested'] = $requested_id;
	
		$this->updateRequest(array(
				'requesting_id' => $this->ids['current'],
				'requested_id' => $this->ids['requested']
		), 2);
		
		Notification_Service::origin('User', $this->ids['current'])
			->destinationId($this->ids['requested'])
			->notifType('friend_request')
			->delete();
			
// 		Notification_Service::deleteNotification('SNS\Models\User', $this->ids['current'], $this->ids['requested']);
	}
	
	public function accept($requested_id) {
		$this->ids['requested'] = $requested_id;
		
		$this->updateRequest(array(
				'requesting_id' => $this->ids['requested'],
				'requested_id' => $this->ids['current']
		), 9);
		
		$this->addFriendRecords();
		
		Notification_Service::originId($this->ids['requested'])
			->destinationId($this->ids['current'])
			->params(array('notif_type' => 'friend_request'))
			->updateParams(array('friend_accept' => true));
		
		Notification_Service::origin('User', $this->ids['current'])
			->destinationId($this->ids['requested'])
			->params(array('notif_type' => 'friend_request', 'friend_accept_for_req' => true))
			->send();	
	}
	
	public function delete($requested_id) {
		$this->ids['requested'] = $requested_id;
		
		$this->updateRequest(array(
				'requesting_id' => $this->ids['current'],
				'requested_id' => $this->ids['requested']
		), 3);
		
		$this->deletedFriendRecords();
		
		Notification_Service::originId($this->ids['current'])
			->destinationId($this->ids['requested'])
			->params(array('notif_type' => 'friend_request'))
			->delete();
		
		Notification_Service::origin('User', $this->ids['requested'])
			->destinationId($this->ids['current'])
			->params(array('notif_type' => 'friend_request', 'friend_accept_for_req' => true))
			->delete();
	}
	
	protected function updateRequest($ids, $status) {
		$this->request->ofRequestedUser($ids['requested_id'], $ids['requesting_id'])->update(array('status' => $status));
		
		$this->request->ofRequestedUser($ids['requested_id'], $ids['requesting_id'])->delete();
	}
	
	protected function deletedFriendRecords() {
		UserFriends::where('user_id', $this->ids['current'])
			->where('friend_user_id', $this->ids['requested'])
			->delete();
			
		UserFriends::where('user_id', $this->ids['requested'])
			->where('friend_user_id', $this->ids['current'])
			->delete();
	}
	
	/**
	 * Adds friend records for both users
	 */
	protected function addFriendRecords() {
		UserFriends::create(array(
			'user_id' => $this->ids['current'],
			'friend_user_id' => $this->ids['requested']
		));
	
		UserFriends::create(array(
			'user_id' => $this->ids['requested'],
			'friend_user_id' => $this->ids['current']
		));
	}
	
	/**
	 * 
	 * @param integer $user_id
	 * @return Illuminate\Support\Collection
	 */
	public function collect($user_id = null, $user_select = array(), $profile_select = array()) {
		if(!$user_id) {
			if($this->ids['current']) {
				$user_id = $this->ids['current'];
			} else {
				return false;
			}
		}
		
		if(!$user_select) {
			return $this->list->where('user_id', $user_id)
			->with(array('profile' => function($q) {
				$q->addSelect(array('registration_id', 'last_name', 'first_name'));
			}))->get();
		}
		
		return $this->list->select($user_select)->where('user_id', $user_id)
				->with(array('profile' => function($q) {
					$q->addSelect(array('registration_id', 'last_name', 'first_name'));
				}))->get();
	}
}