<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'comment_id';
	
	protected $table = 'comments';
	
	protected $fillable = array('post_id', 'comment_message', 'comment_user_id');
	
	protected $dates = array('deleted_at');

}
