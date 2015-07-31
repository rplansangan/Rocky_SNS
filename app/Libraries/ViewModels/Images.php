<?php namespace SNS\Libraries\ViewModels;

use SNS\Libraries\ViewModels\BaseViewModel;

class Images extends BaseViewModel {
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'image_id';
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'pet_id', 'category','image_path', 'image_name', 'image_title' , 'image_mime', 'image_ext', 'is_profile_picture', 'post_id', 'pet_id'];
	
}