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
	
	public static $newsFeedFormat = 'F n @ g:ia';
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\Registration');
	}
	
	public function image() {
		return $this->HasMany('SNS\Models\Images', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		// March 23 at 4:49pm 
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}

}
