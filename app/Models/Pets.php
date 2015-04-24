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
	protected $fillable = array(
			'user_id',
			'pet_name',
			'pet_type',
			'breed',
			'pet_bday',
			'pet_gender',
			'food',
			'pet_likes',
			'pet_dislikes',
			'food_style',
			'brand',
			'weight',
			'height',
			'behavior',
			'feeding_interval',
			'feeding_time',
			'identifying_marks');
	
	protected $dates = array('deleted_at');

	public static $initialRules = array(
		'pet_name' => 'required',
		'pet_type' => 'required',
		'breed' => 'required',
		'pet_bday' => 'required|date',
		'pet_gender' => 'required',
	);
	
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User');
	}
	
	public function image() {
		return $this->hasMany('SNS\Models\Images', 'pet_id');
	}
	
	public function profile_pic() {
		return $this->hasOne('SNS\Models\Images', 'pet_id');
	}

}
