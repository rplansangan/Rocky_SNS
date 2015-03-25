<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Likes extends Model {

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
	protected $fillable = array('post_id', 'like_user_id', 'is_unliked');
	
	protected $dates = array('deleted_at');
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'F n @ g:ia';
	
	// RELATIONSHIP
	public function post() {
		return $this->belongsTo('SNS\Models\Posts');
	}
	
	public function user() {
		return $this->belongsTo('SNS\Models\Registration');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}

}
