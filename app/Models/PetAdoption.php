<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetAdoption extends Model {

	use SoftDeletes;
	
	/**
	 * 
	 * @var string
	 */
	protected $primaryKey = 'adoption_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_adoptions';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['pet_name', 'pet_type', 'breed', 'gender', 'height', 'weight', 'background'];
	
	protected $dates = ['deleted_at'];

}
