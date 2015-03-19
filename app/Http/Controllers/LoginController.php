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
		$input = array_merge($input, array('is_validated' => 1));
		if (Auth::attempt($input)) {
			return redirect()->intended('home');
		} else {
			return redirect('do_login')->with('message' , ' Wrong Email / Password');
		}
	}


	public function login(){
		$data['auth'] = false;
		$data['message'] = "Wrong";
		return view('pages.login' , $data);
	}
	
	public function logout() {
		Auth::logout();
		return redirect('/');
	}
}
