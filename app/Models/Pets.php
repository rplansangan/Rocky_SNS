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
	protected $fillable = array('user_id', 'pet_name', 'pet_type', 'breed', 'pet_bday', 'pet_gender', 'food', 'pet_likes', 'pet_dislikes');
	
	protected $dates = array('deleted_at');

	public static $initialRules = array(
		'pet_name' => 'required',
		'pet_type' => 'required',
		'breed' => 'required',
		'pet_bday' => 'require',
		'pet_gender' => 'required',
	)
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function image() {
		return $this->belongsTo('SNS\Models\Images');
	}

}
