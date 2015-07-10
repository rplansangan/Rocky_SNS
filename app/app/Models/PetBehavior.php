<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class PetBehavior extends Model {

	protected $table = 'pet_behaviors';
	
	protected $fillable = array('animal_type_id', 'behavior', 'particulars', 'order');

}
