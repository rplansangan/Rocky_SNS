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
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class LoginController extends Controller {
	
	use LoginTrait;
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
		
	}
	
	public function signin(Request $request){
		$credentials = array_except($request->all(), ['_token', 'remember_me']);
		
		$remember = ($request->get('remember_me') == 'on') ? true : false;
		
		if(Auth::attempt($credentials, $remember)) {
			Auth::loginUsingId(Auth::id());
			return 'success';
		} else {
			echo 'Invalid Username / Password';
		}
	}

	
	public function logout(){
		Auth::logout();
		return redirect('/');
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


	/*CHECK EMAIL*/

	public function check_email(Request $request){
		$input = array_except($request->all(), array('_token'));

		$email = User::where('email_address' , $input['email'])->count();

		if(!$email){
			echo 'ok';
		}else{
			echo 'not';
		}
	}
}
