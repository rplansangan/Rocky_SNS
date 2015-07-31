<?php namespace SNS\Libraries\ViewModels;

use SNS\Libraries\ViewModels\BaseViewModel;

class Pets extends BaseViewModel {
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'pet_id';
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $fillable = [
							'user_id',
							'rocky_tag_no',
							'pet_name',
							'pet_type',
							'breed',
							'pet_bday',
							'pet_gender',
							'food',
							'pet_likes',
							'pet_dislikes',
							'food_style',
							'brand',
							'weight',
							'height',
							'behavior',
							'feeding_interval',
							'feeding_time',
							'identifying_marks'
						];
	
	/**
	 * The loaded relationships for the model.
	 *
	 * @var array
	 */
	protected $declare = ['profile_pic'];
	
	public function profile_pic($attributes) {
		return new \SNS\Libraries\ViewModels\Images($attributes);
	}
	
}