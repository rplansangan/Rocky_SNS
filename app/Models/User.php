<?php namespace SNS\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

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
	protected $fillable = array('email_address', 'password', 'role_id', 'is_deactivated', 'is_validated', 'is_merchant');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	protected $dates = array('deleted_at');

	
	// RELATIONSHIPS
	public function notif_user() {
		return $this->morphOne('SNS\Models\Notification', 'origin_object');
	}
	
	public function registration() {
		return $this->hasOne('SNS\Models\Registration', 'user_id');
	}
	
	public function pets() {
		return $this->hasMany('SNS\Models\Pets', 'user_id');
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
		return $this->hasOne('SNS\Models\Images', 'user_id', 'user_id');
	}

	public function scopeIsMerc($query, $user_id) {
		return $query->where('user_id', $user_id)->whereIsMerchant(1);
	}
	
}
