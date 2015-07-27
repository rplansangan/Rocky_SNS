<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class VetCoveredAnimals extends BaseModel {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'animal_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vet_non_covered_animals';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['vet_id', 'animal_type', 'particulars'];
	
	protected $dates = ['deleted_at'];

}
