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
	protected $fillable = array('user_id', 'image_path', 'image_name', 'image_mime', 'image_ext', 'is_profile_picture', 'post_id', 'pet_id');
	
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function post() {
		return $this->belongsTo('SNS\Models\Posts');
	}
	
	public function pet() {
		return $this->HasMany('SNS\Models\Pets');
	}

}
