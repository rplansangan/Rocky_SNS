<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class PetFoundation extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'petfoundation_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_foundations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
			'petfoundation_id' , 
			'petfoundation_name', 
			'address_line1',
			'address_line2',
			'city',
			'zip',
			'state',
			'country',
			'phone_country_code',
			'phone_area_code',
			'phone_number',
			'email_address',
			'contact_person',
			'petfoundation_background',
			'banner_image_id',
			'mission_statement',
			'vision_statement',
			'goal_statement'
		);
	
	protected $dates = array('deleted_at');
	
	public static $initialRules = array(
			'petfoundation_name' => 'required',
			'address_line1' => 'required',
			'petfoundation_background' => 'required'			
	);

	public function image() {
		return $this->hasOne('SNS\Models\Images', 'pfa_id', 'petfoundation_id');
	}

}
