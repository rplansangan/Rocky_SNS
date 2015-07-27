<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Likes extends BaseModel {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'like_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'likes';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'like_user_id'];
	
	protected $dates = ['deleted_at'];
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'F n @ g:ia';
	
	// RELATIONSHIP
	public function post() {
		return $this->belongsTo('SNS\Models\Posts');
	}
	
	public function user() {
		return $this->belongsTo('SNS\Models\Registration');
	}
	
	public function notif_user() {
		return $this->hasOne('SNS\Models\User', 'user_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}

}
