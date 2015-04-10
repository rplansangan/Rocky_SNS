<?php namespace SNS\Libraries\Services;

use SNS\Models\Notification;
use SNS\Models\Registration;

class NotificationService {
	
	/**
	 * 
	 * @var SNS\Models\Notification
	 */
	protected $notif;
		
	public function __construct() {
		$this->notif = new Notification();	
	}
	
	public function sendRequest($params) {		
		switch($params['params']['origin']) {
			case 'Registration':
				$obj = Registration::where('registration_id', $params['params']['id']);
				$obj->notif_user()->create(array_except($params, array('params')));
				break;
		}
		return $conf;
	}
	
	protected function formatNotif($notif_collection) {
		
	} 
	
	/**
	 * 
	 * @param integer $user_id
	 */
	public function collectInitial($user_id) {
		return $this->notif->select(array('origin_user_id', 'l10n_key', 'is_read'))->userNotif($user_id);
	}
	
	/**
	 * 
	 * @param integer $user_id
	 * @param integer $take
	 * @param integer $offset
	 */
	public function collectIncremental($user_id, $take, $offset) {
		return $this->notif->select(array('origin_user_id', 'l10n_key', 'is_read'))->userNotifIncremental($user_id, $take, $offset);
	}
}
