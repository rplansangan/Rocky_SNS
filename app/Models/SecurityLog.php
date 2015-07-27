<?php namespace SNS\Models;

use SNS\Models\BaseModel;

class SecurityLog extends BaseModel {
	
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
	protected $fillable = ['ip_address', 'activity_code'];

}
