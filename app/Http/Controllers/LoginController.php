<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Services\ValidationService;
use Auth;
use SNS\Models\User;
use SNS\Models\Registration;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller {
	
	protected $service;
	
	public function __construct() {
		$this->service = new ValidationService();
	}
	
	public function signin(Request $request){
		$input = array_except($request->all(), array('_token'));

		if (Auth::validate($input)) {
	       return redirect()->intended('/');
	    } else {
	        echo 'wrong';
	    }


	    var_dump(Auth::check());
	}
}
