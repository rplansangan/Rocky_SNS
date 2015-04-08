<?php namespace SNS\Libraries\Facades;

use Illuminate\Support\Facades\Facade;

class Notification extends Facade {
	
	protected static function getFacadeAccessor() {
		return 'notifservice';
	}
}
