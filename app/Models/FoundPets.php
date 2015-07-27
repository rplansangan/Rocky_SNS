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
	protected $fillable = [
							'rocky_tag_no',
							'is_guest',
							'user_id',
							'found_in_remark',
							'finder_name',
							'finder_country_code',
							'finder_area_code',
							'finder_tel_no',
							'found_in_address1',
							'found_in_address2',
							'found_in_city',
							'found_in_country',
							'found_in_state',
							'found_in_zip'
						];
	
	protected $dates = ['deleted_at'];


	public function profile() {
		return $this->hasOne('SNS\Models\Pets', 'rocky_tag_no', 'rocky_tag_no')
				->select(['pet_id', 'user_id', 'rocky_tag_no']);
	}
	
	public function image() {
		return $this->hasMany('SNS\Models\LostFoundPetImages', 'found_id' , 'found_id');
	}
}
