<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'post_id';
	
	protected $table = 'posts';
	
	protected $fillable = array('post_message', 'user_id', 'post_tags', 'post_slug', 'image_id');
	
	protected $dates = array('deleted_at');

}
