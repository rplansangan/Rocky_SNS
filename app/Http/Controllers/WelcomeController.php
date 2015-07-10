<?php namespace SNS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use SNS\Models\FoundPets;
use SNS\Models\Registration;
use SNS\Models\Images;
use SNS\Models\MissingPets;
use SNS\Models\Business;
use SNS\Models\LostFoundPetImages;
use SNS\Libraries\Facades\StorageHelper;

use SNS\Libraries\Facades\PostService;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
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

	public function dogsWeek(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.dogsofweek';
		return view('pages.master' , $data);
	}
	public function nearestPS(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.nearestps';
		return view('pages.master' , $data);
	}
	public function nearestVet(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.nearestvet';
		return view('pages.insiderocky' , $data);
	}
	public function missingPets(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.missingpets';
		return view('pages.master' , $data);
	}
	public function rockyNeighbors(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.neighbors';
		return view('pages.master' , $data);
	}
	public function uc(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'errors.uc';
		$data['title'] = 'Under Construction';
		return view('pages.master' , $data);
	}
	public function test(Request $request){
		custom_print_r($request->all());
	}
}
