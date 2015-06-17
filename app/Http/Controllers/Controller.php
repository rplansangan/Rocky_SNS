<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use SNS\Models\FoundPets;
use SNS\Models\MissingPets;
use SNS\Libraries\Facades\Notification;

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
		if(Cache::has('shared.lists.lnfpets')) {
			$list = Cache::get('shared.lists.lnfpets');
			
			$foundPets = $list['found'];
			$missingPets = $list['missing'];
		} else {
			$list['found'] = $foundPets = FoundPets::with(['image'])->orderByRaw("RAND()")->first();
			$list['missing'] = $missingPets = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->first();
			Cache::put('shared.lists.lnfpets', $list, 5);
		}		

		// Notifications
// 		if (Cache::has('user.notifs.' . Auth::id())) {
// 			$notifs = Cache::get('user.notifs.' . Auth::id());
// 		} else {
			$notifs = Notification::collectInitial(auth()->id());
// 			Cache::put('user.notifs.' . Auth::id(), $notifs, 1);
// 		}
		
		view()->share(['user_notifs' =>  $notifs,'found_pets' => $foundPets, 'missing_pets' => $missingPets]);
	}

}
