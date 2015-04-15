<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Business;
use SNS\Models\User;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use SNS\Models\Advertise;

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
		$data['auth'] = true;
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.homepage' , $data);
	}

	public function map(){
		$data['auth'] = true;
		return view('pages.mypet' , $data);
	}

	public function pet_of_the_day(){
		$data['auth'] = true;
		return view('pages.petoftheday' , $data);
	}
	public function trending(){
		$data['auth'] = true;
		return view('pages.trending' , $data);
	}
	public function shop(){
		$data['auth'] = true;
		return view('pages.shop' , $data);
	}
	public function trackers(){
		$data['auth'] = true;
		return view('pages.trackers' , $data);
	}
	public function search(){
		$data['auth'] = true;
		return view('pages.search' , $data);
	}
	

	public function addadvertise(){
		$data['auth'] = true;
		return view('pages.addadvertise' , $data);
	}
}
