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
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('landing.welcome');	
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
		$data['info'] = Business::with(array('advertise' ,'advertise.post' , 'advertise.post.image'))->latest()->get();
		return view('pages.landing' , $data);
	}
	public function petlovers(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'landing.lovers';
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.insiderocky' , $data);
	}
	public function dogsWeek(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'landing.dogsofweek';
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.insiderocky' , $data);
	}
	public function nearestPS(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'landing.nearestps';
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.insiderocky' , $data);
	}

	public function uc(){
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'errors.uc';
		$data['title'] = 'Under Construction';
		return view('pages.insiderocky' , $data);
	}
}
