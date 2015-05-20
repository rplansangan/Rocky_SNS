<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeterinarianRegistrations extends Model {
	
	use SoftDeletes;

	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'vet_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'veterinarian_registrations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 
							'license_number', 
							'clinic_address1', 
							'clinic_address2', 
							'clinic_city', 
							'clinic_state', 
							'clinic_country', 
							'clinic_phone_number',
							'clinic_phone_area_code',
							'clinic_phone_country_code',
							'clinic_email_address',
							'particulars'];
	
	protected $dates = ['deleted_at'];
	
	// RELATIONSHIPS
	public function user() {
		return $this->belongsTo('SNS\Models\User', 'user_id', 'vet_id');
	}
	
	public function specialization() {
		return $this->hasMany('SNS\Models\VeterinarySpecialization', 'vet_spec_id', 'vet_id');
	}
	
	public function booking() {
		return $this->hasMany('SNS\Models\VeterinarianBookings', 'booking_id', 'vet_id');
	}

}
