<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFriends extends BaseModel {

	use SoftDeletes;	
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'user_friends_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_friends';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'friend_user_id'];
	
	protected $dates = ['deleted_at'];
	
	// RELATIONSHIPS
	public function profile() {
		return $this->hasOne('SNS\Models\User', 'user_id', 'friend_user_id')
				->select(['user_id']);
	}
	
	// SCOPES
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	public function scopeOfUserWithReq($query, $user_id, $friend_id) {
		return $query->where('user_id', $user_id)->where('friend_user_id', $friend_id);
	}
}