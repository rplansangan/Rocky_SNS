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
use SNS\Libraries\Services\FriendService;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	

	public function __construct(Initialize $init, Get $cacheGet) {
		// initialize should not be loaded on every ajax calls
		if(!Request::ajax()) {
			$this->initialize($init, $cacheGet);
		}
	}
	
	protected function initialize($init, $cacheGet) {
		$data = $this->setPubGlobals();
// 		dd(config());
		if(Auth::check()) {
			$data += $this->setGlobals();
			$init->initAuth();
			$data['user_data'] = $cacheGet->userData();
		}
		
		view()->share($data);	
	}

	private function setPubGlobals() {
// 		$data['missing_pets'] = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->limit(2)->get();
		$data['title'] = 'Rocky Superdog';
		$data['sub_title'] = '';
		return $data;
	}
	
	protected function setGlobals() {	
		$t = new FriendService; 
		$data['my_pets'] = Pets::with([
			'profile_pic' => function($q){
				$q->where('is_profile_picture' , 1);
			}
			])->where('user_id', Auth::id())->get();
		$data['neighbors'] = $t->collect(Auth::id());		
		return $data;
	}

}
