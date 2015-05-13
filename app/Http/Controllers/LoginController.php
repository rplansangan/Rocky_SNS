<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	protected function chatInit($user) {
		$chat =  curl_init();
		
		curl_setopt_array($chat, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => env('CHAT_SERVER') . 'login',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => array(
				'user' => $user,
			)	
		));
		
		$res = curl_exec($chat);
		curl_close($chat);
	}
	
	public function signin(Request $request){
		$this->middleware('guest');
		
		$input = array_except($request->all(), array('_token'));
		$input = array_merge($input, array('is_validated' => 1));
		
		if (Auth::attempt($input)) {
			$this->chatInit(Auth::user());
			return redirect()->intended('home');
		} else {
			return redirect()->route('login.attempt')->with('message' , ' Wrong Email / Password');
		}
	}

	public function attempted(){
		$data['message'] = "Wrong Email / Password";
		return view('pages.login' , $data);
	}
	
	public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
