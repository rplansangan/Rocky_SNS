<?php namespace SNS\Models;

use SNS\Models\BaseModel;

class PetBehavior extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_behaviors';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['animal_type_id', 'behavior', 'particulars', 'order'];

}
