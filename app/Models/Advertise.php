<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Advertise extends BaseModel {

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
	protected $fillable = [
							'user_id',
							'message',
							'status',
							'type'
						];
	
	protected $dates = ['deleted_at'];

	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $newsFeedFormat = 'F n @ g:i a';
	
	public static $initialRules = [
									'message' => 'required'	,	
									'title' => 'required'		
								];
	
	public function post() {
		return $this->hasOne('SNS\Models\Posts', 'advertise_id')
				->select(['user_id', 'post_id', 'post_message', 'advertise_id', 'created_at']);
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

	public function business(){
		return $this->hasOne('SNS\Models\Business', 'user_id' , 'user_id');
	}
	
	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$newsFeedFormat);
	}
}
