<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Services\ValidationService;
use SNS\Models\EmailValidation;
use Illuminate\Support\Facades\Validator;

class EmailValidationController extends Controller {
	
	protected $service;
	
	public function __construct() {
		$this->service = new ValidationService();
	}
	
	public function register()	{
		$data['auth'] = false;
		return view('pages.register' , $data);
	}
	
	protected function dispatchValidation(Registration $reg) {
		$this->service->send($reg);
	}
	
	public function fromInitial(Request $request) {
		$reg = new Registration();
		
		$validate = Validator::make(array_except($request->all(), array('_token')), Registration::$initialRules);
		
		if($validate->passes()) {
			$reg->email_address = $request['email_address'];
			$reg->first_name = $request['first_name'];
			$reg->last_name = $request['last_name'];
			$reg->birth_date = $request['birth_date'];
			$reg->gender = $request['gender'];
			$reg->is_deactivated = 1;
			$reg->save();
			
			$this->dispatchValidation($reg);
		} else {
			return redirect()->back()->withErrors($validate->errors());
		}
		

	}
	
	public function validateRegistration($id, $hash) {	
		$service = $this->service->confirm($id, $hash);
		
		if($service) {
			$data['details'] = $service;
			$data['auth'] = false;
			return view('pages.register', $data);
		} else {
			// view for errors
			return;
		}
	}
}
