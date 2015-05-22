<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoundPets extends Model {
	
	use SoftDeletes;

	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'found_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'found_pets';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rocky_tag_no', 'is_guest', 'user_id', 'found_in_remark', 'finder_address1', 'finder_address2', 'finder_city', 'finder_country_code', 'finder_area_code', 'finder_tel_no'];
	
	protected $dates = ['deleted_at'];

}
