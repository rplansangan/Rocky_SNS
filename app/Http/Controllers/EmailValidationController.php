<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Services\ValidationService;
use SNS\Models\EmailValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use SNS\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailValidationController extends Controller {
	
	protected $service;
	
	public function __construct() {
		$this->service = new ValidationService();
		$this->middleware('guest');
	}
	
	public function register(Request $request) {
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Registration::$initialRules);
		

		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
		
		$user = new User();
		$user->email_address = $input['email_address'];
		$user->password = Hash::make($input['password']);
		$user->role_id = 1;
		$user->is_deactivated = 0;
		$user->save();
		
		$reg = new Registration();
		$reg->email_address = $input['email_address'];
		$reg->last_name = $input['last_name'];
		$reg->first_name = $input['first_name'];
		$reg->birth_date = $input['birth_date'];
		$reg->gender = $input['gender'];
		$reg->user_id = $user->user_id;
		$reg->is_deactivated = 0;
		$reg->is_validated = 0;
		$reg->save();		
		
		Session::put('details', $input);
		$data['auth'] = false;
		$this->service->send($reg);
		
		return view('pages.message', $data)->with('id', $user->user_id)->with('validation_errors', null);
	}
	
	public function validateRegistration($id, $hash) {	
		$service = $this->service->confirm($id, $hash);
		
		if($service->passes()) {
			$data['auth'] = false;
			return redirect()->route('index');
		} else {
			$data['auth'] = false;
			return view('pages.message', $data)->with('validation_errors', $service->errors)->with('id', $id);
		}
	}
	
	public function resend($id) {
		$service = $this->service->resend($id);
		
		echo "<pre>";
		var_dump($service->passes());
		echo "</pre>";
		
		if($service->passes()) {
			$data['auth'] = false;
			return view('pages.message', $data)->with('id', $id)->with('validation_errors', null);
		} else {
			return redirect('/');
		}
		
	}


	public function validateMessage(){
		$data['auth'] = false;
		return view('pages.message' , $data);
	}
}
