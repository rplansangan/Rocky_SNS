<?php namespace SNS\Services;

use SNS\Models\EmailValidation;
use Carbon\Carbon;
use SNS\Models\Registration;
use Illuminate\Support\Facades\Lang;

class ValidationService {
	
	/**
	 * 
	 * @var Registration;
	 */
	protected $registration;
	
	/**
	 * 
	 * @var string
	 */
	protected $hash;
	
	public function __construct() {
		$this->model = new EmailValidation();
	}
	
	/**
	 * Creates a record for validation
	 * 
	 */
	protected function createInitial() {		
		$this->hash = Hash::make(Carbon::now() . $this->registration->registration_id);
		
		return $this->model->save(array('registration_id' => $this->registration->registration_id, 'hash' => $this->hash));
	}
	
	/**
	 * Sends an e-mail to the user containing a hash value
	 */
	protected function dispatchEmail() {
		$reg = $this->registration;
		
		Mail::send('emails.validation', array('hash' => $this->hash), function($message) use($reg) {
			$message
				->to($reg->email_address, $reg->last_name . ', ' . $reg->first_name)
				->subject(Lang::get('emailvalidation.message_header'));
		});
	}
	
	public function send(Registration $reg) {
		$this->registration = $reg;
		
		$this->createInitial();
		
		$this->dispatchEmail();
	}
	
	protected function performSearch($hash) {
		return $this->model->where('hash', $hash)->get();
	}
	
	protected function validateTimeOut($query) {
		$temp = $query->fetch('created_at');
		$temp = $temp[0];
		
		echo $diff = Carbon::now()->diffInMinutes($temp);
	}
	
	public function confirm($hash) {
		$query = $this->performSearch($hash);
		
		$this->validateTimeOut($query);
	}
}