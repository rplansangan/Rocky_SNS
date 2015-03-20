<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	
	public function __construct() {

	}
	
	public function signin(Request $request){
		$this->middleware('guest');
		
		$input = array_except($request->all(), array('_token'));
		$input = array_merge($input, array('is_validated' => 1));
		
		if (Auth::attempt($input)) {
			return redirect()->intended('home');
		} else { 
			return redirect()->route('login')->withInput(array_except($input, array('password', 'is_validated')));
		}
	}


	public function attempted(){
		$this->middleware('guest');
		
		$data['auth'] = false;
		$data['message'] = "Wrong";
		return view('pages.login' , $data);
	}
	
	public function logout() {
		$this->middleware('auth');
		
		Auth::logout();
		return redirect('/');
	}
}
