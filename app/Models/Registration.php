<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Registration extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'registration_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'registrations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('last_name', 'first_name', 'birth_date', 'gender', 'address_line1', 'address_line2',
								'city', 'zip', 'state', 'country', 'phone_country_code', 'phone_area_code', 'phone_number',
								'alias', 'email_address', 'is_deactivated', 'last_deactivated', 'last_profile_update', 'user_id', 'is_validated');
	
	protected $dates = array('deleted_at');
	
	public static $initialRules = array(
			'email_address' => 'required|confirmed|unique:registrations',
			'first_name' => 'required',
			'last_name' => 'required',
			'birth_date' => 'required',
			'gender' => 'required',
			'password' => 'required|confirmed',
	);
	
	public static $extendedRules = array(			
			'address_line1' => 'required',
			'city' => 'required',
			'zip' => 'required',
			'state' => 'required',
			'phone_number' => 'required'
			
	);
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	// RELATIONSHIPS
	public function emailValidation() {
		return $this->hasOne('SNS\Models\EmailValidation');
	}
	
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function posts() {
		return $this->hasMany('SNS\Models\Posts', 'user_id');
	}
	
	public function likes() {
		return $this->hasMany('SNS\Models\Likes', 'like_user_id');
	}
	
	public function getBirthDateAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format('Y-m-d');
	}

}
