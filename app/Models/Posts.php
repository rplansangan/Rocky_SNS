<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'post_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('post_message', 'user_id', 'post_tags', 'image_id');
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function image() {
		return $this->HasMany('SNS\Models\Images');
	}

}
