<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Services\ValidationService;
use SNS\Models\EmailValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use SNS\Models\User;

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
		$user->password = $input['password'];
		$user->role_id = 1;
		$user->is_deactivated = 1;
		$user->save();
		
		$reg = new Registration();
		$reg->email_address = $input['email_address'];
		$reg->last_name = $input['last_name'];
		$reg->first_name = $input['first_name'];
		$reg->birth_date = $input['birth_date'];
		$reg->gender = $input['gender'];
		$reg->user_id = $user->user_id;
		$reg->is_deactivated = 1;
		$reg->save();		
		
		$this->service->send($reg);
	}
	
	public function sendValidation(Request $request) {
// 		$mergedRules = array_merge(Registration::$initialRules, Registration::$extendedRules);
		$input = array_except($request->all(), array('_token'));
// 		$validate = Validator::make($input, $mergedRules);
		
// 		Session::put('details', $input);		
// 		if($validate->fails()) {
// 			$data['auth'] = false;
// 			return view('pages.register', $data)
// 					->withErrors($validate->errors()->all());
// 		}
		
		$reg = new Registration();
		$reg->last_name = $input['last_name'];
		$reg->first_name = $input['first_name'];
		$reg->birth_date=  $input['birth_date'];
		$reg->gender = $input['gender'];
		$reg->address_line1 = $input['address_line1'];
		$reg->address_line2 = $input['address_line2'];
		$reg->city = $input['city'];
		$reg->zip = $input['zip'];
		$reg->state = $input['state'];
		$reg->country = $input['country'];
		$reg->phone_country_code = $input['phone_country_code'];
		$reg->phone_area_code = $input['phone_area_code'];
		$reg->phone_number = $input['phone_number'];
		$reg->alias = '';
		$reg->email_address = $input['email_address'];
		$reg->is_deactivated = 1;
		$reg->save();
		
		Session::forget('details');
		echo 'email verification sent.';
// 		return view();
		
	}
	
	public function validateRegistration($id, $hash) {	
		$service = $this->service->confirm($id, $hash);
		
		if($service) {
			$data['details'] = $service;
			$data['auth'] = false;
			return redirect()->route('index');
		} else {
			echo 'errors:';
			// view for errors
// 			return;
		}
	}
}
