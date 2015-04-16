<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Newsfeed_view extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'newsfeed';
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'F n @ g:i a';
	
	// SCOPES
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	// RELATIONSHIPS
	public function post() {
		return $this->hasOne('SNS\Models\Posts', 'post_id', 'post_id');
	}
	
	public function user() {
		return $this->hasOne('SNS\Models\Registration', 'user_id', 'post_user_id');
	}
	
	public function image() {
		return $this->hasOne('SNS\Models\Images', 'post_id', 'post_id');
	}
	
	public function like() {
		return $this->hasMany('SNS\Models\Likes', 'post_id', 'post_id');
	}
	
	public function comment() {
		return $this->hasMany('SNS\Models\Comments', 'post_id', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat); 
	}
}
