<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\User;
use SNS\Models\Images;
use SNS\Models\Registration;
use SNS\Models\Business;
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
		
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.lovers';
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.master' , $data);
	}

	
}
