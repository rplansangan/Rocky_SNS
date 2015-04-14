<?php namespace SNS\Libraries\Services;

use SNS\Libraries\Repositories\ImageRepository;
use SNS\Libraries\Repositories\PostRepository;
use SNS\Models\Registration;
use SNS\Libraries\Facades\Likes;
use SNS\Libraries\Facades\Comments;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Repositories\NewsfeedRepository;

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
		$this->newsfeed = new NewsfeedRepository();
	}
	
	protected function token($data) {
		if(array_key_exists('_token', $data)) {
			array_forget($data, '_token');
		}
		
		return $data;
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
		$data = $this->token($data);
				
		if(array_key_exists('file', $data)) {
			$return = $this->post->createWithImage($data);
		} else {
			$return['message'] = $this->post->create($data['message']);
		}
				
		$return['user'] = Registration::find($return['message']->user_id); 
		$return['like'] = 0;
		$return['comments'] = 0;
		
		return $return;
	}
	
	/**
	 * 
	 * @param integer $take
	 */
	public function initialNewsFeed($id, $take = null) {
		if(!$take) {
			$take = 5;
		}
		
		return $this->newsfeed->initial($id, $take);
	}
	
	/**
	 * 
	 * @param integer $skip
	 * @param integer $take
	 */
	public function incrementalNewsFeed($id, $skip, $take = null) {
		if(!$take) {
			$take = 5;
		}
		return $this->newsfeed->incremental($id, $skip, $take);
	}
	
	public function like($post_id) {
		return Likes::set($post_id);
	}
	
	public function createComment($data) {
		$this->token($data);
		
		return Comments::set($data);
	}
}
