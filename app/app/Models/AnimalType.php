<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalType extends Model {

	use SoftDeletes;
	
	protected $table = 'animal_types';
	
	protected $fillable = array('animal', 'particulars', 'order');
	
	protected $dates = array('deleted_at');

}
