<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use SNS\Libraries\Facades\Notification;
use Illuminate\Support\Facades\Request;
use SNS\Models\FoundPets;
use SNS\Models\MissingPets;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	
	public function __construct() {
		$this->initialize();		
	}
	
	protected function initialize() {
		if(auth()->check()) {
// 			if(!Request::ajax()) {
				$this->setGlobals();
// 			}
		}	
	}
	
	protected function setGlobals() {
		$foundpets = FoundPets::with(['image'])->orderByRaw("RAND()")->first();
		$missing = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->first();

		// Notifications
		view()->share(['user_notifs' => Notification::collectInitial(auth()->id()) , 'found_pets' => $foundpets , 'missing_pets' => $missing]);
	}

}
