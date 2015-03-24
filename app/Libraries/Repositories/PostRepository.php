<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Posts;
use Illuminate\Support\Facades\Auth;
class PostRepository { 
	
	/**
	 * 
	 * @var SNS\Models\Posts
	 */
	protected $post;
	
	public function __construct() {
		$this->post  = new Posts();
	}
	
	public function create($data) {
		return $this->post->create(array(
				'user_id' => Auth::id(),
				'post_message' => $data,				
		));
	}
	
}