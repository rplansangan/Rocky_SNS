<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function signin(Request $request){
		$this->middleware('guest');
		
		$input = array_except($request->all(), array('_token'));
		$input = array_merge($input, array('is_validated' => 1));
		
		if (Auth::attempt($input)) {
			return redirect()->intended('home');
		} else {
			return redirect()->route('login.attempt')->with('message' , ' Wrong Email / Password');
		}
	}

	public function attempted(){
		$data['auth'] = false;
		$data['message'] = "Wrong Email / Password";
		return view('pages.login' , $data);
	}
	
	public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
