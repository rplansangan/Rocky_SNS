<?php namespace SNS\Models;

use SNS\Models\BaseModel;

class PetCharacteristics extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_characteristics';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['pet_id', 'feeding_interval_id', 'pet_behavior_id', 'food_brand_id'];

}
