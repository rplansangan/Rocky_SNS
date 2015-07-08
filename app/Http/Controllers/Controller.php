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
		$this->setPubGlobals();

		if(auth()->check()) {
// 			if(!Request::ajax()) {
				$this->setGlobals();
// 			}
		}	
	}

	private function setPubGlobals() {
		$list['missing'] = $missingPets = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->limit(2)->get();
		Cache::add('shared.lists.lnfpets', $list, 5);

		view()->share(['missing_pets' => $missingPets]);

	}
	
	protected function setGlobals() {
		if(Cache::has('shared.lists.lnfpets')) {
			$list = Cache::get('shared.lists.lnfpets');
			
			$foundPets = $list['found'];
			$missingPets = $list['missing'];
		} else {
			
		}		

		$notifs = null;
		view()->share(['user_notifs' =>  $notifs]);
	}

}
