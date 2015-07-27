<?php namespace SNS\Models;

use Carbon\Carbon;
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
			'rocky_tag_no',
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
		'pet_gender' => 'required',
	);
	
	public $dbDateFormat = 'Y-m-d H:i:s';
	
	public $bdayFormat = 'F n, Y';
	
	public function scopeOfUser($query, $user_id) {
		return $query->where('user_id', $user_id);
	}
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User')
				->select(['user_id']);
	}
	
	public function image() {
		return $this->hasMany('SNS\Models\Images', 'pet_id');
	}
	
	public function profile_pic() {
		return $this->hasOne('SNS\Models\Images', 'pet_id')
				->where('is_profile_picture', 1);
	}
	
	public function pet_food() {
		return $this->hasOne('SNS\Models\FoodBrands', 'id', 'brand')
				->select(['id', 'brand_name', 'animal_type_id']);
	}
	public function pet_type() {
		return $this->hasOne('SNS\Models\AnimalType', 'id', 'pet_type');
	}
	public function pet_behavior() {
		return $this->hasOne('SNS\Models\PetBehavior', 'id', 'behavior')
				->select(['id', 'animal_type_id', 'behavior']);
	}
	
	public function getPetBdayAttribute($date) {
		return Carbon::createFromFormat($this->dbDateFormat, $date)->format($this->bdayFormat);
	}

	public function foundpets() {
		return $this->hasMany('SNS\Models\FoundPets', 'rocky_tag_no' , 'rocky_tag_no');
	}

}
