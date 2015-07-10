<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodBrands extends Model {

	use SoftDeletes;
	
	protected $table = 'food_brands';
	
	protected $fillable = array('brand_name', 'particulars', 'animal_type_id', 'order');
	
	protected $dates = array('deleted_at');

}
