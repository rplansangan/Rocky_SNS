<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class FriendRequest extends BaseModel {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'request_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'friend_requests';	
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['request_message', 'requesting_user_id', 'requested_user_id', 'status'];
	
	protected $dates = ['deleted_at'];
	
	// SCOPES
	public function scopeOfUser($query, $user_id) {
		return $query->where('requesting_user_id', $user_id);
	}
	
	public function scopeOfUserWithReq($query, $user_id, $req_id) {
		return $query->where('requesting_user_id', $user_id)->where('requested_user_id', $req_id);
	}
	
	public function scopeOfRequestedUser($query, $user_id, $req_id) {
		return $query->where('requested_user_id', $user_id)->where('requesting_user_id', $req_id);
	}
}
