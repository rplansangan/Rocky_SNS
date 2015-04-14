<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FriendRequest extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'request_id';
	
	protected $fillable = array('request_message', 'requesting_user_id', 'requested_user_id', 'status');
	
	protected $dates = array('deleted_at');
	
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
