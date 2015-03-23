<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityLog extends Model {
	
	protected $primaryKey = 'log_id';
	
	protected $table = 'security_logs';
	
	protected $fillable = array('ip_address', 'activity_code');

}
