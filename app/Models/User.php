<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	/**
	 * 
	 * @var string
	 */
	protected $primaryKey = 'user_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
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
	 * Maximum login attempts allowable
	 * @var integer
	 */
	public static $logThreshold = 5;
	
	/**
	 * How long (in minutes) will an account be locked
	 * @var integer
	 */
	public static $timeLock = 15;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	protected $dates = ['deleted_at'];

	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $msgDateFormat = 'h:i a F d, Y';
	
	public static $timeLockNull = '0000-00-00 00:00:00';
	
	public static $timeLockFallback = '12:00 am November 30, -0001';
	
	// RELATIONSHIPS
	public function notif_user() {
		return $this->morphOne('SNS\Models\Notification', 'origin_object');
	}
	
	public function registration() {
		return $this->hasOne('SNS\Models\Registration', 'user_id')
				->select(['registration_id', 'user_id', 'first_name', 'last_name']);
	}

	public function fullRegistration() {
		return $this->hasOne('SNS\Models\Registration', 'user_id');
	}
	
	public function pets() {
		return $this->hasMany('SNS\Models\Pets', 'user_id');
	}

	public function selectedPet() {
		return $this->hasOne('SNS\Models\Pets', 'pet_id', 'selected_pet')->select(['user_id', 'pet_id', 'pet_name']);
	}
	
	public function posts() {
		return $this->hasMany('SNS\Models\Posts', 'user_id', 'user_id');
	}
	
	public function images() {
		return $this->hasMany('SNS\Models\Images', 'user_id');
	}
	
	public function friends() {
		return $this->hasMany('SNS\Models\UserFriends', 'user_id');
	}
	
	public function business() {
		return $this->hasOne('SNS\Models\Business', 'user_id');
	}
	
	public function prof_pic() {
		return $this->hasOne('SNS\Models\Images', 'user_id', 'user_id')
				->select(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext'])
				->where('is_profile_picture', 1)
				->where('pet_id', 0);
	}
	
	public function adverts() {
		return $this->hasMany('SNS\Models\Advertise', 'user_id', 'user_id')
				->select(array('id', 'user_id', 'title' , 'type', 'created_at'))
				->latest();
	}
	
	public function otheradd(){
		return $this->hasMany('SNS\Models\Advertise', 'user_id', 'user_id');
	}

	public function bsns_reg() {
		return $this->hasOne('SNS\Models\Business', 'user_id', 'user_id');
	}
	
	public function vet_reg() {
		return $this->hasOne('SNS\Models\VeterinarianRegistrations', 'user_id', 'vet_id');
	}
	
	public function foundation() {
		return $this->hasOne('SNS\Models\PetFoundation', 'user_id', 'user_id');
	}

	public function scopeIsMerc($query, $user_id) {
		return $query->where('user_id', $user_id)->whereIsMerchant(1);
	}
	
	public function getTimeLockAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$msgDateFormat);
	}
	
}
