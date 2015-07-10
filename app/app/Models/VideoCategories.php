<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoCategories extends Model {

	use SoftDeletes;
	
	protected $table = 'post_categories';
	
	protected $fillable = array('category', 'particulars', 'order');

}
