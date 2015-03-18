<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Likes extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'like_id';
	
	protected $table = 'likes';
	
	protected $fillable = array('post_id', 'like_user_id', 'is_unliked');
	
	protected $dates = array('deleted_at');

}
