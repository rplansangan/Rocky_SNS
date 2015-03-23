<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pets extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'pet_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pets';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'pet_name', 'pet_type', 'breed');
	
	protected $dates = array('deleted_at');
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function image() {
		return $this->belongsTo('SNS\Models\Images');
	}

}
