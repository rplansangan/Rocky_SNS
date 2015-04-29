<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class PetCharacteristics extends Model {

	protected $table = 'pet_characteristics';
	
	protected $fillable = array('pet_id', 'feeding_interval_id', 'pet_behavior_id', 'food_brand_id');

}
