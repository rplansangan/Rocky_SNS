<?php namespace SNS\Http\Controllers;
use SNS\Models\FoundPets;
use SNS\Models\LostFoundPetImages;
use Illuminate\Http\Request;
use SNS\Libraries\Facades\StorageHelper;
use Carbon\Carbon;
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
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	
		return view('pages.landing');
	}

	public function signup()
	{
		return view('pages.mainpage');
	}

	public function layoutOne()
	{
		return view('pages.loland');
	}
	public function petfoundation(){
		echo 'ok';
	}
	public function petvideos(){
		echo 'ok';
	}
	public function petshops(){
		echo 'ok';
	}
	public function petlovers(){
		echo 'ok';
	}	
}
