<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'comment_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('post_id', 'comment_message', 'comment_user_id');
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function user() {
		return $this->hasOne('SNS\Models\Registration', 'user_id', 'comment_user_id');
	}
	
	public function post() {
		return $this->belongsTo('SNS\Models\Posts', 'post_id');
	}

	

}
