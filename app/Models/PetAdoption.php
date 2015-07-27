<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetAdoption extends BaseModel {

	use SoftDeletes;
	
	/**
	 * 
	 * @var string
	 */
	protected $primaryKey = 'pa_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pet_adoptions';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['pet_name', 'pet_type', 'breed', 'gender', 'height', 'weight', 'background', 'foundation_id'];
	
	protected $dates = ['deleted_at'];
	
	public function foundation() {
		return $this->belongsTo('SNS\Models\PetFoundation', 'foundation_id', 'foundation_id');
	}
	
	public function prof_pic() {
		return $this->hasOne('SNS\Models\PetFoundationImages', 'adoption_id', 'pa_id')
				->where('is_profile_picture', 1)
				->select(['image_id', 'user_id', 'adoption_id']);
	}
	
	public function images() {
		return $this->hasMany('SNS\Models\PetFoundationImages', 'adoption_id', 'pa_id');
	}

}
