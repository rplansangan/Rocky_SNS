<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeterinarianSpecialization extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'vet_spec_id';	
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'veterinarian_specializations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'specialization_id', 'vet_id'];
	
	protected $dates = ['deleted_at'];
	
	// RELATIONSHIPS
	public function vet() {
		return $this->belongsTo('SNS\Models\VeterinarianRegistrations', 'vet_id', 'vet_spec_id');
	}

}
