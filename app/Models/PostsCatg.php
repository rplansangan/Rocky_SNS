<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostsCatg extends Model {
	
	use SoftDeletes;

	protected $table = 'posts_categories_pool';
	
	protected $fillable = array('post_id', 'media_cat_id');
	
	protected $dates = array('deleted_at');

}
