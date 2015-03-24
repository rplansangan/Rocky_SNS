<?php namespace SNS\Libraries\Services;

use SNS\Libraries\Repositories\ImageRepository;
use SNS\Libraries\Repositories\PostRepository;

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
		
		$this->post->create($data['message']);
		
		var_dump($this->image->create($data['file']));
		
	}
}
