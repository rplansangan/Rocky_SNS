<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeterinarianBookings extends BaseModel {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'booking_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'veterinarian_bookings';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['date_time', 'status', 'vet_id', 'user_id', 'particulars'];
	
	protected $dates = ['deleted_at'];
	
	// RELATIONSHIPS
	public function vet() {
		return $this->belongsTo('SNS\Models\VeterinarianRegistrations', 'vet_id', 'booking_id');
	}

}
