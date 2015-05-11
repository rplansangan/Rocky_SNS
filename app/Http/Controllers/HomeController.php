<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use SNS\Models\User;
use SNS\Models\Images;
use SNS\Models\Advertise;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use Carbon\Carbon;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
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
		$this->middleware('auth');
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		User::where('user_id' , Auth::id())->update(['last_post' => Carbon::now()]);
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.homepage', $data);
	}

	public function map(){
		return view('pages.mypet');
	}

	public function pet_of_the_day(){
		return view('pages.petoftheday');
	}
	public function trending(){
		return view('pages.trending');
	}
	public function shop(){
		$data['info'] = Advertise::with(array('post', 'post.image'))->latest()->get();
		return view('pages.shop' , $data);
	}
	public function trackers(){
		return view('pages.trackers');
	}
	public function search(){
		return view('pages.search');
	}

	public function addadvertise(){
		return view('pages.addadvertise');
	}

	public function compete(){
	
		return view('pages.compete');
	}

	public function videos(){
		$data['video'] = Images::with(array('post' , 'register'))->where('image_mime' , 'like' , '%video%')->latest()->get();
		return view('pages.videos' , $data);
	}

	public function rockyranger(){
		return view('pages.rockyranger');
	}

	public function petfoundation(){
		return view('pages.petfoundation');
	}
}
