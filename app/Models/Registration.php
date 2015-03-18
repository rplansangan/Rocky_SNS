<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'registration_id';
	
	protected $table = 'registration';
	
	protected $fillable = array('last_name', 'first_name', 'birth_date', 'gender', 'address_line1', 'address_line2',
								'city', 'zip', 'state', 'country', 'phone_country_code', 'phone_area_code', 'phone_number',
								'alias', 'email_address', 'is_deactivated', 'last_deactivated', 'last_profile_update', 'user_id');
	
	protected $dates = array('deleted_at');

}
