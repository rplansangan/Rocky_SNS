<?php namespace SNS\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController {
	
	use DispatchesCommands;
	
	public function __construct() {
		$this->init();
	}
	
	private function init() {
		if(Auth::check()) {
			view()->share('user_name', Auth::user()->registration->first_name . ' ' . Auth::user()->registration->last_name);
		}
	}
	
}
