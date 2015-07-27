<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentions extends BaseModel {

	use SoftDeletes;
	
	protected $primaryKey = 'mentiond_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mentions';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'comment_id'];
	
	protected $dates = ['deleted_at'];

}
