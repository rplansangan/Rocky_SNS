<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeterinarySpecialization extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'specialization_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'veterinary_specializations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['description', 'particulars', 'order'];
	
	protected $dates = ['deleted_at'];

}
