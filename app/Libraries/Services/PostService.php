<?php namespace SNS\Libraries\Services;

use SNS\Libraries\Repositories\ImageRepository;
use SNS\Libraries\Repositories\PostRepository;
use SNS\Models\Registration;

class PostService {
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\ImageRepository
	 */
	public $image;
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\PostRepository
	 */
	public $post;
	
	public function __construct() {
		$this->image = new ImageRepository();
		$this->post = new PostRepository();
	}
	
	/**
	 * Creates post data
	 * IMPORTANT NOTE:
	 * $data should be associative array where 
	 * keys [file] will be used for file and [message] for the file's description / message
	 * 
	 * @param array $data
	 */
	public function create($data) {
		if(array_key_exists('_token', $data)) {
			array_forget($data, '_token');
		} 
				
		$return = $this->post->createWithImage($data);
		
		$return['user'] = Registration::find($return['message']->user_id); 
		
		return $return;
	}
	
	/**
	 * 
	 * @param integer $take
	 */
	public function initialNewsFeed($take = null) {
		if(!$take) {
			$take = 5;
		}
		
		return $this->photo->take($take)->latest()->get();
	}
	
	/**
	 * 
	 * @param integer $skip
	 * @param integer $take
	 */
	public function incrementalNewsFeed($skip, $take) {
		return $this->photo->skip($skip)->take($take)->latest()->get();
	}
}
