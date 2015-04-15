<?php namespace SNS\Libraries\Services;

use SNS\Models\Notification;
use SNS\Models\User;

class NotificationService {
	
	/**
	 * 
	 * @var SNS\Models\Notification
	 */
	protected $notif;
	
	protected $models_namespace = 'SNS\Models';
		
	public function __construct() {
		$this->notif = new Notification();	
	}
	
	public function sendRequest($params) {		
		switch($params['details']['origin']) {
			case 'Registration':
				$obj = User::find($params['details']['id'])
						->notif_user()->create(array_except($params, array('details')));
				break;
		}
	}
	
	protected function isActive($is_read) {
		if(!$is_read) {
			return 'active';
		}
		return 'inactive';
	}
	
	/**
	 * Formatting method for friend request type notification
	 * @param View $notif
	 */
	protected function formatFriendReq($notif) {		
		$profile_route = route('profile.showProfile', array($notif->origin_object->registration->registration_id));
		$name = $notif->origin_object->registration->first_name . ' ' . $notif->origin_object->registration->last_name;
		
		$params = json_decode($notif->params);
		// if notification params has friend_ignore prop / if friend request is ignored
		if(isset($params->friend_ignore)) {
			return view('notifications.friend_request_ignore')
				->with('active', $this->isActive($notif->is_read))
				->with('profile_route', $profile_route)
				->with('name', $name);
		}
		
		// if notification params has friend_accept prop / if friend request is accepted
		if(isset($params->friend_accept)) {
			return view('notifications.friend_request_accept')
				->with('active', $this->isActive($notif->is_read))
				->with('profile_route', $profile_route)
				->with('name', $name);
		}
		
		// if notification params has friend_accept_for_req / if friend request is accepted
		if(isset($params->friend_accept_for_req)) {
			return view('notifications.friend_request_accept_for_req')
				->with('active', $this->isActive($notif->is_read))
				->with('profile_route', $profile_route)
				->with('name', $name);
		}
			return view('notifications.friend_request')
				->with('active', $this->isActive($notif->is_read))
				->with('profile_route', $profile_route)
				->with('name', $name)
				->with('requesting_id', $notif->origin_object->registration->registration_id);		
	}
	
	/**
	 * Formats each item depending on their respective notif_type
	 * @param mixed $notif_collection
	 * @return string
	 */
	protected function formatNotif($notif_collection) {
		$html = '';
		foreach($notif_collection as $notif) {			
			$params = json_decode($notif->params);
			switch($params->notif_type) {
				case 'friend_request':					
					$html .= $this->formatFriendReq($notif);
				break;
			}
		}
		
		return $html;
	} 
	
	/**
	 * 
	 * @param integer $user_id
	 */
	public function collectInitial($user_id) {
		$notif_collection = $this->notif
								->select(array('origin_object_id', 'origin_object_type', 'is_read', 'params'))
								->with(array('object'))
								->userNotif($user_id);
		
		return $this->formatNotif($notif_collection);
	}
	
	/**
	 * 
	 * @param integer $user_id
	 * @param integer $take
	 * @param integer $offset
	 */
	public function collectIncremental($user_id, $take, $offset) {
		return $this->notif
					->select(array('origin_object_id', 'l10n_key', 'is_read', 'params'))
					->with(array('object'))
					->userNotifIncremental($user_id, $take, $offset);
	}
	
	/**
	 * 
	 * @param string $object_type
	 * @param integer $notif_id
	 */
	public function deleteNotification($object_type, $from, $to) {
		$this->notif->notifByObj($object_type, $from, $to)
			->delete();
	}
	
	/**
	 * 
	 * @param mixed $object_type
	 * @param integer $from
	 * @param integer $to
	 * @param array $more_params
	 */
	public function setIsRead($object_type, $from, $to, $more_params = array()) {
		if(!$more_params) {
			$this->notif->notifByObj($object_type, $to, $from)
				->update(array('is_read' => 1));
		} else {
			$params = $this->notif->select('params')
						->notifByObj($object_type, $to, $from)
						->latest()->take(1)->get();
			
			$this->notif->notifByObj($object_type, $to, $from)
				->latest()->take(1)->update(array(
						'is_read' => 1,
						'params' => $this->mergeParams(json_decode($params[0]->params), $more_params, 'json')
				));
		}
	}
	
	protected function mergeParams($params, $more_params, $format = null) {
		while(($current = current($more_params) != false)) {
			$key = key($more_params);
			$params->$key = current($more_params);
			next($more_params);
		}

		if(!$format) {
			return $params;
		}
		
		switch($format) {
			case 'json':
				return json_encode($params);
				break;
		}
	}
}
