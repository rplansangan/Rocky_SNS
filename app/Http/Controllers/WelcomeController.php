<?php namespace SNS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class WelcomeController extends Controller {

	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);		
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
			return redirect('home');
		}else{
			return view('landing.welcome');	
		}
	}

	public function uc(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'errors.uc';
		$data['title'] = 'Under Construction';
		return view('pages.master' , $data);
	}
	
	public function test(){
		echo 'ok';
	}

	
}
