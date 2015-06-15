<?php namespace SNS\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ErrorLogs extends Model {

	protected $table = 'error_logs';

	protected $fillable = ['from_user', 'route_name', 'error_code', 'error_msg', 'stack_trace'];
	
	public static $dbDateFormat = 'Y-m-d H:i:s';
	
	public static $adminFormat = 'F n @ g:i a';
	
	public function getCreatedAtAttribute($date) {
	    return Carbon::createFromFormat(self::$dbDateFormat, $date)->format(self::$adminFormat);
	}

}
