<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentions extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'mentiond_id';
	
	protected $table = 'mentions';
	
	protected $fillable = array('post_id', 'comment_id');
	
	protected $dates = array('deleted_at');

}
