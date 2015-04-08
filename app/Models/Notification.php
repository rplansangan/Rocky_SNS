<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model {

	use SoftDeletes;
	
	protected $table = 'notifications';
	
	protected $fillable = array(
							'origin_user_id',
							'destination_user_id',
							'notification_object',
							'l10n_key',
							'is_read'
						);

	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS

	// SCOPES
	/**
	 * 
	 * @param unknown $query
	 * @param integer $user_id
	 */
	public function scopeUserNotif($query, $user_id) {
		return $query->where('destination_user_id', $user_id)
				->latest()->take(5)->get();
	}
	
	public function scopeUserNotifIncremental($query, $user_id, $take, $offset) {
		return $query->where('destination_user_id', $user_id)
				->latest()->take($take)->skip($offset)->get();
	}
}
