<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsfeed_view extends Model {

	use SoftDeletes;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'newsfeed';
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'Y-m-d H:i:s';
	
	// SCOPES
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	public function scopeOfPostUID($query, $user_id) {
		return $query->where('post_user_id', $user_id);
	}
	
	// RELATIONSHIPS
	public function post() {
		return $this->hasOne('SNS\Models\Posts', 'post_id', 'post_id')
				->select(['post_id', 'user_id', 'post_message', 'created_at']);
	}
	
	public function user() {
		return $this->hasOne('SNS\Models\Registration', 'user_id', 'post_user_id')
				->select(['registration_id', 'user_id', 'first_name', 'last_name']);
	}

	public function image() {
		return $this->hasOne('SNS\Models\Images', 'post_id', 'post_id')
				->select(['image_id', 'post_id' , 'image_mime' , 'category', 'image_path', 'image_name', 'image_ext']);
	}

	public function like() {
		return $this->hasMany('SNS\Models\Likes', 'post_id', 'post_id')
				->select(['like_id', 'post_id', 'like_user_id']);
	}
	
	public function comment() {
		return $this->hasMany('SNS\Models\Comments', 'post_id', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat); 
	}
}
