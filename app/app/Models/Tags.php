<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'tag_id';
	
	protected $table = 'tags';
	
	protected $fillable = array('post_id', 'tagged_user_id', 'is_untagged');

}
