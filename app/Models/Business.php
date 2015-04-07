<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Business extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'business_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'business_registration';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'business_id' , 
		'business_name', 
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
		'company_background',
		'banner_image_id',
		);
	
	protected $dates = array('deleted_at');
	
	public static $initialRules = array(
			'business_name' => 'required',
			'address_line1' => 'required',
			'company_background' => 'required'			
	);

	public function image() {
		return $this->hasMany('SNS\Models\Images', 'business_id');
	}
}
