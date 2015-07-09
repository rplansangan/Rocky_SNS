<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use SNS\Models\FoundPets;
use SNS\Models\Pets;
use SNS\Models\Registration;
use SNS\Models\MissingPets;
use SNS\Libraries\Facades\Notification;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	
	public function __construct() {
		$this->initialize();
	}
	
	protected function initialize() {
		
		$data = $this->setPubGlobals();

		if(auth()->check()) {
			$data += $this->setGlobals();
		}

		view()->share($data);	
	}

	private function setPubGlobals() {
		$missingPets = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->limit(2)->get();
		$data['missing_pets'] = $missingPets;
		$data['title'] = 'Rocky Superdog';
		return $data;
	}
	
	protected function setGlobals() {	
		$data['my_pets'] = Pets::with('profile_pic')->where('user_id', Auth::id())->get();
		$data['profile'] = Registration::with(array('prof_pic'))->find(Auth::id());
		return $data;
	}

}
