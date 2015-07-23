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
	
	protected $selected_model;

	protected $current_details;
	
	protected $destination_details;
	
	protected $current_params;
	
	protected $notif_type;
	
	public function __construct() {
		$this->notif = new Notification();	
	}
	
	public function sendRequest($params) {	
		switch($params['details']['origin']) {
			case 'Registration':
			case 'Like':
			case 'Comments':
			case 'User':
				$obj = User::find($params['details']['id'])
						->notif_user()->create(array_except($params, array('details')));
				return $obj;
				break;
		}
	}
	
	/**
	 * 
	 * @param string $origin
	 * @param integer $id
	 * @return \SNS\Libraries\Services\NotificationService
	 */
	public function origin($origin, $id) {
		$this->current_details['details']['origin'] = $origin;
		$this->current_details['details']['id'] = $id;
		return $this;
	}
	
	/**
	 * 
	 * @param integer $id
	 * @return \SNS\Libraries\Services\NotificationService
	 */
	public function originId($id) {
		$this->current_details['details']['id'] = $id;
		return $this;
	}
	
	/**
	 * 
	 * @param integer $id
	 * @return \SNS\Libraries\Services\NotificationService
	 */
	public function destinationId($id) {
		$this->destination_details['destination_user_id'] = $id;
		return $this;
	}
	
	/**
	 * 
	 * @param string $type
	 * @return \SNS\Libraries\Services\NotificationService
	 */
	public function notifType($type) {
		$this->current_params['params']['notif_type'] = $type;
		$this->notif_type = $type;
		return $this;
	}
	
	/**
	 * 
	 * @param array $params
	 * @return \SNS\Libraries\Services\NotificationService
	 */
	public function params($params = array()) {
		if(!is_null($this->current_params['params'])) {
			$this->current_params['params'] = array_merge($this->removeKey($params, array('notif_type')), $params);
		} else {
			$this->current_params['params'] = $this->removeKey($params, 'notif_type');
		}
		
		if(array_key_exists('notif_type', $params)) {
			$this->notif_type = $params['notif_type'];
		} 
		
		return $this;
	}
	
	protected function removeKey($array, $keys) {
		$array = array_except($array, $keys);
		
		if(count($array) != 0) {
			return $array;
		} else {
			return NULL;
		}
	}
	
	public function updateParams($params = array()) {	
		if($this->current_params['params'] != null) {
			$params = json_encode(array_merge($params, $this->current_params['params']));
		} else {
			$params = json_encode(array_merge($params));
		}
		
		$this->notif
			->where('destination_user_id', $this->destination_details['destination_user_id'])
			->where('origin_object_id', $this->current_details['details']['id'])
			->where('params', json_encode($this->current_params['params']))
			->update(array('params' => $params));
				
		return $this;
	}
	
	/**
	 * 'Sends' a notification
	 * IMPORTANT NOTE: destination and origin id should first be declared. 
	 */
	public function send() {
		$params = array_merge($this->current_details, $this->destination_details, $this->current_params);
		$params['notif_type'] = $this->notif_type;
		$params['params'] = json_encode($params['params']);

		$this->cur_notif = $this->sendRequest($params);
	
		return $this;
	}
	
	/**
	 * 
	 */
	public function delete() {
		$this->notif
			->where('destination_user_id', $this->destination_details['destination_user_id'])
			->where('origin_object_id', $this->current_details['details']['id'])
			->where('notif_type', $this->notif_type)
			->where('params', json_encode($this->current_params['params']))
			->delete();
		return $this;
	}
	
	protected function isActive($is_read) {
		if(!$is_read) {
			return 'active';
		}
		return 'inactive';
	}
	
	protected function getOriginUserDetails($notif) {
		$notif->origin_object->load([
				'registration',
				'registration.prof_pic' => function($q) {
					$q->where('is_profile_picture', 1);
					$q->where('pet_id', 0);
				}
		])->get();
		
		$data['name'] = $notif->origin_object->registration->getFullName();
		$data['profile_route'] = route('profile.view', array($notif->origin_object->user_id));
		$data['created_at'] = $notif->created_at;
		$data['image'] = $notif->origin_object->registration->prof_pic;
		$data['id'] = $notif->origin_object->user_id;
		return $data;
	}
	
	/**
	 * Formatting method for friend request type notification
	 * @param View $notif
	 */
	protected function formatFriendReq($notif) {		
		$origin_user = $this->getOriginUserDetails($notif);
		
		$params = json_decode($notif->params, true);
		
		$params['active'] = $this->isActive($notif->is_read);
		$params['profile_route'] = $origin_user['profile_route'];
		$params['name'] = $origin_user['name'];
		
		// if notification params has friend_ignore prop / if friend request is ignored
		if(isset($params['friend_ignore'])) {
			return view('notifications.friend_request_ignore', $params);
		}
		
		// if notification params has friend_accept prop / if friend request is accepted
		if(isset($params['friend_accept'])) {
			return view('notifications.friend_request_accept', $params)
				->with('created_at' , $origin_user['created_at'])
				->with('image' , $origin_user['image']);
		}
		
		// if notification params has friend_accept_for_req / if friend request is accepted
		if(isset($params['friend_accept_for_req'])) {
			return view('notifications.friend_request_accept_for_req', $params)
				->with('created_at' , $origin_user['created_at'])
				->with('image' , $origin_user['image'])
				->with('requesting_id', $origin_user['id']);
		}
			return view('notifications.friend_request', $params)
				->with('created_at' , $origin_user['created_at'])
				->with('image' , $origin_user['image']);	
	}
	
	protected function formatLike($notif) {
		$origin_user = $this->getOriginUserDetails($notif);
		$params = json_decode($notif->params);
		$post_route = route('profile.view', array($notif->destination_user_id)) . '#post-' . $params->post_id;
		
		return $origin_user['name'];
	}
	
	protected function formatComment($notif) {
		$origin_user = $this->getOriginUserDetails($notif);
		$params = json_decode($notif->params);
		$post_route = route('profile.view', array($notif->destination_user_id)) . '#post-' . $params->post_id;
		
		return $origin_user['name'];
	}	
	/**
	 * Formats each item depending on their respective notif_type
	 * @param mixed $notif_collection
	 * @return string
	 */
	protected function formatNotif($notif_collection) {
		$html = ''; 
		foreach($notif_collection as $notif) {		
			switch($notif->notif_type) {
				case 'friend_request':					
					$html .= $this->formatFriendReq($notif);
				break;
				case 'post_like':
					$html .= $this->formatLike($notif);
				break;
				case 'post_comment':
					$html .= $this->formatComment($notif);
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
								->select(array('origin_object_id', 'origin_object_type', 'is_read', 'params', 'destination_user_id', 'notif_type' , 'created_at'))
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
