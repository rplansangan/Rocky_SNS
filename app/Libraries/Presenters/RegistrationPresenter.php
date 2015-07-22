<?php namespace SNS\Libraries\Presenters;

trait RegistrationPresenter {
	
	public function getFullName() {
		return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
	}
}
