<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SNS\Models\User;

class LoginController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function signin(Request $request){
		$this->middleware('guest');
		
		$input = array_except($request->all(), array('_token'));
		
		if (Auth::attempt($input)) {
			if(!Auth::user()->is_validated) {
				$id = Auth::user()->registration->registration_id; Auth::logout();
				return view('pages.message', ['id' => $id])->withErrors(['message' => [trans('emailvalidation.login.not_validated')]]);
			}
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
