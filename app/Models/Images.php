<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'image_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'pet_id', 'category','image_path', 'image_name', 'image_title' , 'image_mime', 'image_ext', 'is_profile_picture', 'post_id', 'pet_id');
	
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	public function register() {
		return $this->hasOne('SNS\Models\Registration' , 'registration_id' , 'user_id');
	}
	public function post() {
		return $this->belongsTo('SNS\Models\Posts');
	}
	public function pet() {
		return $this->belongsTo('SNS\Models\Pets');
	}

	
	// SCOPES
	/**
	 * 
	 * @param unknown $query
	 * @param string $user_id
	 * @param string $pet_id
	 */
	public function scopeProfilePicture($query, $user_id, $pet_id = null) {
		return $query->where('user_id', $user_id)->where('pet_id', $pet_id)->get();
	}
	
	public function scopeUserProfPic($query) {
		return $query->where('is_profile_picture', 1);
	}

}
