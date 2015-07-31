<?php namespace SNS\Libraries\ViewModels;

use SNS\Libraries\ViewModels\BaseViewModel;

class Registration extends BaseViewModel {
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'registration_id';
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $fillable = [
							'last_name', 'first_name', 'birth_date', 'gender', 'address_line1', 'address_line2',
							'city', 'zip', 'state', 'country', 'phone_country_code', 'phone_area_code', 'phone_number',
							'alias', 'email_address', 'is_deactivated', 'last_deactivated', 'last_profile_update', 'user_id', 'is_validated'
						];
	
}
