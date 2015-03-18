<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Services\ValidationService;

class EmailValidation extends Controller {
	
	protected $service;
	
	public function __construct() {
		$this->service = new ValidationService();
	}
	
	public function showInitial() {
		
		
	}
	
	protected function dispatchValidation(Registration $reg) {
		$this->service->send($reg);
	}
	
	public function fromInitial(Request $request) {
		$reg = new Registration();
		
		$reg->save();
		
		$this->dispatchValidation($reg);
	}
	
	public function validate($hash) {
		$this->service->confirm($hash);
	}
}
