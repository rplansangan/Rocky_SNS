<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Business;
use SNS\Models\User;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;

class MerchantController extends Controller {

	public function __construct() {
		parent::__construct();
	}	
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
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
		$data['newsfeed'] = PostService::initialNewsFeed();
		return view('pages.homepage' , $data);
	}

	public function merchant_activation(){
		$data['auth'] = true;
		return view('pages.advertise' , $data);
	}
}
