<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SNS\Models\User;
use SNS\Models\Registration;
use SNS\Libraries\Services\ValidationService;
use SNS\Libraries\Traits\LoginTrait;

class LoginController extends Controller {
	
	use LoginTrait;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function signin(Request $request){
		custom_print_r($request->all());
	}

	public function attempted() {
		$this->middleware('guest');
		$data['message'] = "Wrong Email / Password";
		return view('pages.login' , $data);
	}
	
	public function logout(){
		Auth::logout();
		return redirect('/');
	}
	
	public function forgotView() {
		$this->middleware('guest');
		return view('pages.forgotpass.main');
	}
	
	public function forgotProcess(Request $request) {
		$this->middleware('guest');
		$reg = Registration::where('email_address', $request->get('email'))->get();
		
		if($reg->isEmpty()) {
			return redirect()->back()->withErrors(['message' => [trans('emailvalidation.not_found.email')]]);
		}
		$id = $reg[0];
		$service = new ValidationService();
		$service->id($id->registration_id)->createPasswordToken();
		
		return view('pages.forgotpass.message', ['id' => $service->reg->registration_id]);
	}
	
	public function resendToken($id) {
		$this->middleware('guest');
		$service = new ValidationService();
		$service->id($id)->resendPasswordToken();
		
		return view('pages.forgotpass.message', ['id' => $id]);
	}
	
	public function validatePass($id, $hash) {
		$this->middleware('guest');
		$service = new ValidationService(); 
		
		$service->id($id)->hash($hash)->validatePasswordToken();
		
		if($service->errors()) {
			return view('pages.forgotpass.timeout', ['id' => $id])->withErrors(['message' => $service->errors()]);
		} else {
			return view('pages.forgotpass.change_pw', ['id' => $id, 'hash' => $hash]);
		}
	}
	
	public function processPass(Request $request) {
		$this->middleware('guest');
		$params = array_except($request->all(), ['_token']);
		$validate = Validator::make(array(
						'new_pass' => $params['new_password'],
						'new_pass_confirmation' => $params['new_password_confirmation']
				), array(
						'new_pass' => 'required|confirmed|min:6|max:24'
				), array(
						'new_pass.required' => trans('profile.validation.password.required'),
						'new_pass.min' => trans('profile.validation.password.min'),
						'new_pass.max' => trans('profile.validation.password.max'),
						'new_pass.confirmed' => trans('profile.validation.password.confirm')
				));
		
		if($validate->passes()) {
			$reg = Registration::find($params['id']); 
			$reg->load('user'); 
			
			User::find($reg->user->user_id)->update(array('password' => Hash::make($params['new_password'])));
				
			$service = new ValidationService();
			$service->id($params['id'])->hash($params['hash'])->type('password')->deleteHash();
				
			return redirect()->route('home')->withErrors(array('message' => trans('profile.settings.password.changed')));
		} else {
			return redirect()->back()->withErrors($validate->errors()->all());
		}
	}
}
