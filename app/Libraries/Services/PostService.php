<?php namespace SNS\Libraries\Services;

use SNS\Models\User;
use SNS\Libraries\Facades\Likes;
use SNS\Libraries\Facades\Comments;
use SNS\Libraries\Repositories\ImageRepository;
use SNS\Libraries\Repositories\PostRepository;
use SNS\Libraries\Repositories\NewsfeedRepository;
use SNS\Libraries\Repositories\LikeRepository;
use SNS\Libraries\Repositories\CommentsRepository;
use Illuminate\Support\Facades\Auth;

class PostService {
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\ImageRepository
	 */
	private $image;
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\PostRepository
	 */
	private $post;
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\NewsfeedRepository
	 */
	private $newsfeed;
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\LikeRepository
	 */
	private $like;
	
	/**
	 * 
	 * @var SNS\Libraries\Repositories\CommentsRepository
	 */
	private $comment;
	
	public function __construct() {
		$this->image = new ImageRepository();
		$this->post = new PostRepository();
		$this->like = new LikeRepository();
		$this->comment = new CommentsRepository();
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
	public function create($data, $file) {
		$data = $this->token($data);
		
		return $this->post->setPost($data, $file);
	}

	public function deletePost($id) {
		return $this->post->delete($id);
	}	
	
	/**
	 * 
	 * @param integer $take
	 */
	public function initialNewsFeed($id = null, $post_uid = null,  $take = null) {
		if(!$take) {
			$take = 5;
		}

		return $this->newsfeed->initial($id , $post_uid, $take);
	}

	
	
	/**
	 * 
	 * @param integer $skip
	 * @param integer $take
	 */
	public function incrementalNewsFeed($id, $skip, $post_uid, $take = null) {
		if(!$take) {
			$take = 5;
		}
		return $this->newsfeed->incremental($id, $skip, $post_uid, $take);
	}
	
	public function like($post_id, $destination) {
		return $this->like->set($post_id, $destination);
	}
	
	public function createComment($postId, $postUId, $message) {
		return $this->comment->set($postId, $postUId, $message);
	}
	
	public function deleteComment($postId, $postUId, $commentId) {
		return $this->comment->delete($postId, $postUId, $commentId);
	}

	public function checkNewPost(){
		return $this->newsfeed->checkNewPost(Auth::id() , User::where('user_id' , Auth::id())->get()[0]->last_post);
	}

	public function get_newfeeds(){
		return $this->newsfeed->getnewfeeds(Auth::id() , User::where('user_id' , Auth::id())->get()[0]->last_post );
	}
	public function lastpostupdate(){
		User::where('user_id' , Auth::id())->update(['last_post' => Carbon::now()]);
	}
}
