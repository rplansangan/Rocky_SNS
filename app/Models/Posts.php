<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Posts extends BaseModel {

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
	protected $fillable = ['post_message', 'user_id', 'pet_id', 'post_tags', 'image_id'];
	
	protected $dates = ['deleted_at'];
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'Y-m-d H:i:s';
	
	// RELATIONSHIPS
	public function pet() {
		return $this->hasOne('SNS\Models\Pets', 'pet_id', 'pet_id')
			->select(['pet_id', 'user_id', 'pet_name']);
	}
	
	public function user() {
		return $this->hasOne('SNS\Models\Registration', 'user_id', 'user_id')
				->select(['registration_id', 'user_id', 'first_name', 'last_name']);
	}
	
	public function image() {
		return $this->hasOne('SNS\Models\Images', 'post_id')
				->select(['image_id', 'post_id', 'image_mime' , 'category', 'image_path', 'image_name', 'image_ext']);
	}
	
	public function like() {
		return $this->hasMany('SNS\Models\Likes', 'post_id')
				->select(['like_id', 'post_id']);
	}
	
	public function comment() {
		return $this->hasMany('SNS\Models\Comments', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}

}
