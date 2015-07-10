<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetFoundationImages extends Model {

	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'image_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_foundation_images';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'foundation_id', 'adoption_id', 'image_path', 'image_name', 'image_title', 'image_mime', 'image_ext', 'image_desc', 'is_profile_picture'];

	public function foundation() {
		return $this->belongsTo('SNS\Models\PetFoundation', 'foundation_id', 'petfoundation_id');
	}
	
	public function adoption() {
		return $this->belongsTo('SNS\Models\PetAdoption', 'adoption_id', 'adoption_id');
	}
}
