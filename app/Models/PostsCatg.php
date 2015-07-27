<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostsCatg extends BaseModel {
	
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts_categories_pool';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'media_cat_id'];
	
	protected $dates = ['deleted_at'];

}
