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
	protected $errors;
	
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
		return $this->query['validation'] =  EmailValidation::where('id', $this->id)->where('hash', $this->hash)->get();	
	}
	
	protected function validateTimeOut() {
		$temp = $this->query['validation']->fetch('created_at');
		
		$diff = Carbon::now()->diffInMinutes(Carbon::parse($temp[0]));
// 		echo $diff;
		if($diff > 30) {
			// insert message time out here
			return false;
		}
		
		return true;
	}
	
	protected function activateRegistration() {
		$query = Registration::find($this->id);
		$query->is_deactivated = 0;
		$query->save();
		
		$query->user()->update(array('is_deactivated' => 0));
		
		$this->removeHash();
		
		return $this->query['registration'] = $query;;
	}
	
	public function confirm($id, $hash) {
		$this->id = $id;
		$this->hash = $hash;	
		
		$query = $this->performSearch();
		
		if($query->isEmpty()) {
			// insert invalid hash message here
			return false;
		}
		
		if($this->validateTimeOut()) {
			$this->activateRegistration();
		} else {
			// insert view for sending a validation
			return false;
		}
		
		return true;
	}
	
	public function resend($id) {
		$this->id;
		
		$this->makeHash();
		
		$this->removeHash();
		
		$this->dispatchEmail();
	}
}