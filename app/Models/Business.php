<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Business extends BaseModel {

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
	protected $fillable = [
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
							];
	
	protected $dates = ['deleted_at'];
	
	public static $initialRules = [
									'business_name' => 'required',
									'address_line1' => 'required',
									'company_background' => 'required'			
								];

	public function image() {
		return $this->hasMany('SNS\Models\Images', 'business_id');
	}
	public function advertise() {
		return $this->hasMany('SNS\Models\Advertise', 'user_id' , 'user_id');
	}
}
