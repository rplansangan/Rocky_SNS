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
	public function advertised(){
	    $user = new User();
	    $ind = $user->isMerc(Auth::id())->get();
		$data['auth'] = true;
		if(!$ind->isEmpty()){
			return view('pages.addadvertise' , $data);
		}else{
			return view('pages.check' , $data);
		}
		
	}

	public function merchant_activation(){
		$data['auth'] = true;
		return view('pages.advertise' , $data);
	}
}
