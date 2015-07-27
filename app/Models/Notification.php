<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends BaseModel {

	use SoftDeletes;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
							'destination_user_id',
							'origin_object_type',
							'origin_object_id',
							'l10n_key',
							'is_read',
							'params',
							'notif_type'
						];

	protected $dates = ['deleted_at'];

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
	
	public function scopeNotifByObj($query, $object_type, $from, $to) {
		return $query->where('origin_object_type', $object_type)
			->where('origin_object_id', $from)
			->where('destination_user_id', $to);
	}
	public function object() {
		return $this->morphTo('origin_object');
	}
}
