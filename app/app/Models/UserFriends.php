<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFriends extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'user_friends_id';
	
	protected $fillable = array('user_id', 'friend_user_id');
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function profile() {
		return $this->hasOne('SNS\Models\User', 'user_id', 'friend_user_id');
	}
	// SCOPES
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	public function scopeOfUserWithReq($query, $user_id, $friend_id) {
		return $query->where('user_id', $user_id)->where('friend_user_id', $friend_id);
	}
}