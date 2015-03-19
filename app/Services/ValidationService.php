<?php namespace SNS\Services;

use SNS\Models\EmailValidation;
use Carbon\Carbon;
use SNS\Models\Registration;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

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
	
	/**
	 * Confirmation details id & hash
	 * @var array
	 */
	protected $confirm;
	
	/**
	 * 
	 * @var array
	 */
	public $errors = array();
	
	/**
	 * 
	 * @var string
	 */
	protected $is_validated;
	
	/**
	 * 
	 */
	protected function makeHash() {
		$this->hash = md5(Carbon::now() . $this->registration->registration_id);
	}
	/**
	 * Creates a record for validation
	 * 
	 */
	protected function createHash() {
		$model = new EmailValidation();
		$model->registration_id = $this->registration->registration_id;
		$model->hash = $this->hash;
		return $model->save();
	}
	
	protected function removeHash() {
		EmailValidation::where('registration_id', $this->id)->delete();
	}
	
	/**
	 * Sends an e-mail to the user containing a hash value
	 */
	protected function dispatchEmail() {
		$reg = $this->registration;
		
		Mail::send('emails.validation', array('route' => route('register.validateHash', array($this->registration->registration_id, $this->hash)), 'name' => $this->registration->first_name, 'hash' => $this->hash), function($message) use($reg) {
			$message
				->to($reg->email_address, $reg->last_name . ', ' . $reg->first_name)
				->subject(Lang::get('emailvalidation.message_header'));
		});
	}
	
	public function send(Registration $reg) {
		$this->registration = $reg;
		
		$this->makeHash();
		
		$this->createHash();
		
		$this->dispatchEmail();
	}
	
	/**
	 * Performs a query using the given hash
	 * @param string $hash
	 */
	protected function performSearch() {
		return $this->query['validation'] =  EmailValidation::where('registration_id', $this->id)->where('hash', $this->hash)->get();	
	}
	
	protected function validateTimeOut() {
		$temp = $this->query['validation']->fetch('created_at');
		
		$diff = Carbon::now()->diffInMinutes(Carbon::parse($temp[0]));
		
		if($diff > 30) {
			$this->errors['timeout'] = Lang::get('emailvalidation.message_validation_timeout');
			return $this;
		}
		
		return true;
	}
	
	protected function activateRegistration() {
		$query = Registration::find($this->id);
		$query->is_validated = 0;
		$query->save();
		
		$query->user()->update(array('is_validated' => 0));
		
		$this->removeHash();
		
		return $this->query['registration'] = $query;;
	}
	
	protected function confirmRegistration() {
		$query = Registration::find($this->id)->get();
		$is_validated = $query->fetch('is_validated');
		
		if($is_validated[0] == 1) {
			$this->errors['validated'] = Lang::get('emailvalidation.message_validation_validated');
			$this->is_validated = true;
			return true;
		}
		return false;
	}
	
	public function confirm($id, $hash) {
		$this->id = $id;
		$this->hash = $hash;	
		
		$query = $this->performSearch();
		
		if($query->isEmpty()) {
			// insert invalid hash message here
			$this->errors['notfound'] = Lang::get('emailvalidation.message_validation_notfound');
			return $this;
		}
		
		if($this->validateTimeOut()) {
			$this->activateRegistration();
		} else {
			return false;
		}
		
		return $this;
	}
	
	public function resend($id) {
		$this->id = $id;;
		
		$this->registration = Registration::find($this->id);
		
		if($this->confirmRegistration()) {
			return $this;
		}
		
		$this->makeHash();
		
		$this->removeHash();
		
		$this->createHash();
		
		$this->dispatchEmail();
		
		return $this;
	}
	
	public function passes() {
		if($this->errors == NULL) {
			return true;
		} else {
			return false;
		}
	}
}