<?php namespace SNS\Libraries\Services;

use SNS\Models\EmailValidation;
use SNS\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;

class ValidationService {
	
	/**
	 * 
	 * @var \SNS\Models\EmailValidation
	 */
	private $model;
	
	/**
	 * 
	 * @var string
	 */
	private $hash;
	
	/**
	 * 
	 * @var \SNS\Models\Registration
	 */
	private $reg;
	
	/**
	 * 
	 * @var array
	 */
	private $errors;
	
	/**
	 * 
	 * @var \SNS\Models\Emailvalidation
	 */
	private $last_validation;
	
	public function __construct() {
		$this->model = new EmailValidation();
	}
	
	/**
	 * Params for query.
	 * @var array
	 */
	private $params;
	
	/**
	 * If set to true, method will return $this. 
	 * If set to false, method will only return hash
	 * @param bool $return
	 */
	private function createHash($return = false) {
		$hash = md5(Carbon::now() . $this->params['id']);
		
		if($return == false) {
			return $hash;
		} else {
			$this->hash = $hash;
			return $this;
		}
	}
	
	/**
	 * Get User's Registration details given $params['current']['id']
	 */
	private function getUserReg() {
		$col = Registration::find($this->params['id'])->get();
		return $this->reg = $col[0];
	}
	
	/**
	 * Sets parameters needed for sendMail()
	 * @return array
	 */
	private function setMailParams() {
		switch($this->params['type']) {
			case 'password':
				$params['view'] = 'emails.forgotpw';
				$params['route'] = 'login.forgot.validate';
				$params['subj_header'] = 'emailvalidation.forgot.message_header';
				break;
		}
		
		return $params;
	}
	
	private function sendMail() {
		$reg = $this->getUserReg();
	
		$params = $this->setMailParams();
		
		Mail::send($params['view'], [
		'route' => route($params['route'], [$this->params['id'], $this->hash]),
		'name' => $reg->first_name],
			function($message) use($reg, $params) {
				$message
					->to($reg->email_address, $reg->last_name . ', ' . $reg->first_name)
					->subject(Lang::trans($params['subj_header']));
			}
		);
	}
	
	/**
	 * Registration ID setter
	 * @param integer $id
	 * @return \SNS\Libraries\Services\ValidationService
	 */
	public function id($id) {
		$this->params['id'] = $id;
		
		return $this;
	}
	
	/**
	 * EmailValidation hash setter
	 * @param string $hash
	 * @return \SNS\Libraries\Services\ValidationService
	 */
	public function hash($hash) {
		$this->params['hash'] = $hash;
		
		return $this;
	}
	
	/**
	 * EmailValdiation type setter
	 * @param string $type
	 * @return \SNS\Libraries\Services\ValidationService
	 */
	public function type($type) {
		$this->params['type'] = $type;
		
		return $this;
	}
	
	/**
	 * set id() before using this method.
	 */
	public function createPasswordToken() {
		$this->params['type'] = 'password';
		
		$this->createHash(true);
		
		$this->sendMail();
		
		return $this->model->create(['registration_id' => $this->params['id'], 'type' => $this->params['type'], 'hash' => $this->hash]);
	}
	
	/**
	 * returns true if token is valid
	 * @return boolean
	 */
	private function checkTimeOut() {
		$diff = Carbon::now()->diffInMinutes(Carbon::parse($this->last_validation->created_at));
		
		if($diff > 30) {
			$this->errors[] = trans('emailvalidation.message_validation_timeout');			
			return false;
		} else {
			return true;
		}
	}
	
	private function getLastValidation() {
		$q = EmailValidation::where('registration_id', $this->params['id'])
		->where('type', $this->params['type'])->get();
		
		if($q->isEmpty()) {
			return null;
		} else {
			return $this->last_validation = $q[0];
		}		
	}
	
	/**
	 * returns true if a previous token is found
	 * @return boolean
	 */
	private function checkPrevious() {
		if(!is_null($this->getLastValidation())) {
			return true;
		} else {
			return false;
		}
	}
	
	
	public function resendPasswordToken() {
		$this->params['type'] = 'password';
		
		if($this->checkPrevious() != true) {
			return $this;
		}
		
		$this->last_validation->delete();
		
		$this->createPasswordToken();
		
		return $this;
	}
	
	private function validateTimeout() {		
		if($this->checkTimeOut() == false) {
			if(!in_array(trans('emailvalidation.message_validation_notfound'), $this->errors)) {
				$this->errors[] = trans('emailvalidation.message_validation_notfound');
			}
		}	
	}
	
	public function validatePasswordToken() {
		$this->params['type'] = 'password';
		
		$this->getLastValidation();
		
		if($this->last_validation->hash != $this->params['hash']) {
			$this->errors[] = trans('emailvalidation.message_validation_notfound');
			return $this;
		}
		
		if(!$this->checkTimeOut() == true) {
			return $this;
		}
		
		return $this;
	}
	
	/**
	 * requires id(), type() and hash() to be set
	 */
	public function deleteHash() {
		return $this->model
						->where('registration_id', $this->params['id'])
						->where('type', $this->params['type'])
						->where('hash', $this->params['hash'])
						->delete();
	}
	
	public function errors() {
		return $this->errors;
	}
}
