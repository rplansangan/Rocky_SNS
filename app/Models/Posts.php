<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Posts extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'post_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('post_message', 'user_id', 'post_tags', 'image_id');
	
	protected $dates = array('deleted_at');
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'Y-m-d H:i:s';
	
	// RELATIONSHIPS
	public function user() {
		return $this->hasOne('SNS\Models\Registration', 'user_id', 'user_id');
	}
	
	public function image() {
		return $this->hasOne('SNS\Models\Images', 'post_id')
				->select(['user_id', 'image_id', 'post_id']);
	}
	
	public function like() {
		return $this->hasMany('SNS\Models\Likes', 'post_id');
	}
	
	public function comment() {
		return $this->hasMany('SNS\Models\Comments', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}

}
