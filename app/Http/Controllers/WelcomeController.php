<?php namespace SNS\Http\Controllers;
use SNS\Models\FoundPets;
use SNS\Models\Images;
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
		$data['left'] = 'landing.superdogmenu';
		$data['right'] = 'landing.right';
		$data['mid'] = 'landing.front';
		return view('pages.landing' , $data);
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
		$data['left'] = 'landing.superdogmenu';
		$data['right'] = 'landing.right';
		$data['mid'] = 'landing.foundation';
		return view('pages.landing' , $data);
	}
	public function petvideos(){
		$data['left'] = 'landing.superdogmenu';
		$data['right'] = 'landing.right';
		$data['mid'] = 'landing.video';
		$data['video'] = Images::select(array('image_id', 'image_mime', 'post_id', 'user_id', 'image_title', 'category'))
								->with(array(
									'post' => function($q) {
										$q->addSelect(array('post_id', 'post_message', 'post_tags'));
									}, 
									'register' => function($q) {
										$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
									}
								))->where('image_mime' , 'like' , '%video%')->latest()->get();
		$data['status'] = "Latest Videos";
		return view('pages.landing' , $data);
	}
	public function petshops(){
		$data['left'] = 'landing.superdogmenu';
		$data['right'] = 'landing.right';
		$data['mid'] = 'landing.shop';
		return view('pages.landing' , $data);
	}
	public function petlovers(){
		$data['left'] = 'landing.superdogmenu';
		$data['right'] = 'landing.right';
		$data['mid'] = 'landing.lovers';
		return view('pages.landing' , $data);
	}	
}
