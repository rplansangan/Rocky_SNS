<?php namespace SNS\Libraries\ViewModels;

use SNS\Libraries\ViewModels\BaseViewModel;

class User extends BaseViewModel {
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'user_id';
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $fillable = [
							'email_address',
							'password',
							'user_role',
							'is_deactivated',
							'is_validated',
							'session_token',
							'user_token',
							'socket_id',
							'attempts',
							'time_lock',
							'selected_pet'
						];
	
	/**
	 * The loaded relationships for the model.
	 *
	 * @var array
	 */
	protected $declare = ['prof_pic', 'registration', 'selected'];
	
	public function registration($attributes) {
		return new \SNS\Libraries\ViewModels\Registration($attributes);
	}
	
	public function prof_pic($attributes) {
		return new \SNS\Libraries\ViewModels\Images($attributes);
	}
	
	public function selected($attributes) {
		return new \SNS\Libraries\ViewModels\Pets($attributes);
	}
}