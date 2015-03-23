<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class images extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'image_id';
	
	protected $table = 'images';
	
	protected $fillable = array('user_id', 'image_path', 'is_profile_picture', 'post_id', 'pet_id');
	
	protected $dates = array('deleted_at');

}
