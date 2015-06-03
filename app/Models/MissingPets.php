<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissingPets extends Model {
	
	use SoftDeletes;

	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'missing_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'missing_pets';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'rocky_tag_no',
		'brand',
		'lost_in',
		'owner',
		'pet_when',
		'feed_interval',
		'feed_time',
		'food',
		'pet_name',
		'pet_type',
		'breed',
		'gender',
		'weight',
		'height',
		'background',
		'pet_nickname',
		'pet_donts',
		'pet_behavior',
		'lost_in_address1',
		'lost_in_address2',
		'lost_in_city',
		'lost_in_state',
		'lost_in_country',
		'lost_in_remarks'
	];
	
	protected $dates = ['deleted_at'];

	public function profile() {
		return $this->hasOne('SNS\Models\Pets', 'rocky_tag_no', 'rocky_tag_no');
	}
	
}
