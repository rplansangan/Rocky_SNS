<?php namespace SNS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use SNS\Models\Pets;
use SNS\Models\Registration;
use SNS\Models\MissingPets;
use SNS\Libraries\Facades\Notification;
use SNS\Libraries\Services\FriendService;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	
// 	public function __construct(Initialize $init, Get $cacheGet) {
// 		$this->initialize($init, $cacheGet);
// 	}
// public function __construct() {
// 	dd(app()->make('Initialize'));
// }
	
	protected function initialize($init, $cacheGet) {
		$data = $this->setPubGlobals();

		if(Auth::check()) {
			$data += $this->setGlobals();
			$init->initAuth();
			
			$data['user_data'] = $cacheGet->userData();
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
		$t = new FriendService; 
		$data['my_pets'] = Pets::with('profile_pic')->where('user_id', Auth::id())->get();
		$data['profile'] = Registration::with(array('prof_pic'))->find(Auth::id());
		$data['neighbors'] = $t->collect(Auth::id());
		return $data;
	}

}
