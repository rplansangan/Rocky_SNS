<?php namespace SNS\Libraries\Traits;

use SNS\Models\User;
use Carbon\Carbon;

trait LoginTrait {
	
	/**
	 * 
	 * @var SNS\Models\User
	 */
	private $lastAttempted;
	
	/**
	 * Attempt count
	 * @var integer
	 */
	private $attempts;
	
	/**
	 * 
	 * @var array
	 */
	private $messages;
	
	/**
	 * 
	 * @var boolean
	 */
	private $locked;
	
	private function getAttempts() {
		$this->attempts = $this->lastAttempted->attempts;
	}
	
	public function releaseAccount(User $user) {
		$this->lastAttempted = $user;
		$this->lastAttempted->update(['attempts' => 0, 'time_lock' => User::$timeLockNull]);
	}
	
	/**
	 * Pushes an error message to the $messages prop
	 * @param string $string
	 */
	private function pushMessage($string) {
		$this->messages[] = $string;
	}
	
	public function asses(User $user) {
		$this->lastAttempted = $user;
		
		$this->getAttempts();
		
		// increments attempts attrib upon entry
		$this->lastAttempted->update(['attempts' => ++$this->attempts]);
		
		// check if attempts attrib less than threshold
		if(User::$logThreshold > $this->attempts) {			
			$this->pushMessage(trans('errors.login.attempt', [
					'attempts' => User::$logThreshold - $this->lastAttempted->attempts,
					'lock' => User::$timeLock]
			));
			
			return $this;	
		}
		
		if(($this->attempts >= User::$logThreshold) && ($this->lastAttempted->time_lock == (User::$timeLockNull OR User::$timeLockFallback))) {
			// update time_lock attrib to current server time + $timeLock var from User model
			$this->lastAttempted->update(['time_lock' => Carbon::now()->addMinutes(User::$timeLock)]);
		}
		
		$this->pushMessage(trans('errors.login.locked', [
				'time' => $this->lastAttempted->time_lock
		]));
		
		return $this;
	}
	
	/**
	 * returns locked prop
	 * @return boolean
	 */
	public function isLocked() {
		return $this->locked;
	}
	
	/**
	 * Checks if user account is locked
	 * @param User $user
	 * @return \SNS\Libraries\Traits\LoginTrait
	 */
	public function checkLock(User $user) {
		$this->lastAttempted = $user;
		
		// check if time_lock attrib is null 
		if($this->lastAttempted->time_lock == User::$timeLockFallback) {
			
			// account is not locked
			$this->locked = false;
			
			return $this;
		}
		
		// checks the time difference in minutes
		// if diff is more than 15 minutes, this block updates the user's attempts and time_lock attrib to null
		if(Carbon::now()->diffInMinutes(Carbon::createFromFormat(User::$msgDateFormat, $this->lastAttempted->time_lock), true) >= 15) {
			// update time_lock and attempts attribs to null
			$this->lastAttempted->update(['time_lock' => User::$timeLockNull, 'attempts' => 0]);
		
			// account is not locked
			$this->locked = false;
		
			return $this; 
		} else {
			$this->pushMessage(trans('errors.login.locked', [
				'time' => $this->lastAttempted->time_lock
			]));
			
			// account is locked
			$this->locked = true;
			
			return $this;
		}
	}
	
	/**
	 * error messages
	 * @return array
	 */
	public function messages() {
		return $this->messages;
	}
}
