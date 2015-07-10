<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityLog extends Model {
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'log_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'security_logs';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('ip_address', 'activity_code');

}
