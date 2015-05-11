<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Advertise extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'advertise';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'user_id',
		'message',
		'status',
		'type'
		);
	
	protected $dates = array('deleted_at');

	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'F n @ g:i a';
	
	public static $initialRules = array(
			'message' => 'required'	,	
			'title' => 'required'		
	);
	
	public function post() {
		return $this->hasOne('SNS\Models\Posts', 'advertise_id');
	}
	
	public function like() {
		return $this->hasMany('SNS\Models\Likes', 'post_id');
	}
	
	public function image() {
		return $this->hasOne('SNS\Models\Images', 'post_id');
	}

	public function comment() {
		return $this->hasMany('SNS\Models\Comments', 'post_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}
}
