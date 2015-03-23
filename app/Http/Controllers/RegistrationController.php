<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use SNS\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller {
	
	protected $service;
	
	public function __construct() {
		$this->service = new ValidationService();
// 		$this->middleware('guest');
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
		$user->is_validated = 0;
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
		
		$data['auth'] = false;
		$this->service->send($reg);
		
		return view('pages.message', $data)->with('id', $user->user_id)->with('validation_errors', null);
	}
	
	public function validateRegistration($id, $hash) {	
		$service = $this->service->confirm($id, $hash);
		
		if($service->check()) {
			$this->service->deleteHash($id, $hash);
			return redirect()->route('register.details', $id);
		} else {
			$data['auth'] = false;
			return view('pages.message', $data)->with('validation_errors', $service->errors)->with('id', $id);
		}
	}
	
	public function details($id) {
		Session::put('details', Registration::find($id)->toArray());
		$data['auth'] = false;
		return view('pages.register', $data);
	}
	
	public function resend($id) {
		$service = $this->service->resend($id);
		
		if($service->check()) {			
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

	public function updateDetails($id){
		return redirect()->route('home');
	}
}
