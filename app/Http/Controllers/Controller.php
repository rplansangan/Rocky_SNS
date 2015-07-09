<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use SNS\Models\FoundPets;
use SNS\Models\Pets;
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
			#$this->setGlobals();
		}	
	}

	private function setPubGlobals() {
		$missingPets = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->limit(2)->get();
		$list['missing'] = $missingPets;

		Cache::add('shared.lists.lnfpets', $list, 5);
		$data['missing_pets'] = $missingPets;
		
		$data['title'] = 'Rocky Superdog';
		view()->share($data);

	}
	
	protected function setGlobals() {
		if(Cache::has('shared.lists.lnfpets')) {
			$list = Cache::get('shared.lists.lnfpets');
			
			$foundPets = $list['found'];
			$missingPets = $list['missing'];
		} else {
			
		}		
		$data['my_pets'] = Pets::with('profile_pic')->where('user_id' , '=' , Auth::id())->get();
		view()->share($data);
	}

}
