<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use SNS\Libraries\Facades\Notification;
use Illuminate\Support\Facades\Request;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	
	public function __construct() {
		$this->initialize();		
	}
	
	protected function initialize() {
		if(auth()->check()) {
			if(!Request::ajax()) {
				$this->setGlobals();
			}
		}	
	}
	
	protected function setGlobals() {
		// Notifications
		view()->share('user_notifs', Notification::collectInitial(auth()->id()));
	}

}
