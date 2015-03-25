<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;

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
	
	public function createWithImage($data) {
		$return['message'] = $this->post->create(array(
				'user_id' => Auth::id(),
				'post_message' => $data['message']
		));
		
		$filename = md5($data['file']->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
		$dir = StorageHelper::create(Auth::id());
		
		$img_data = new Images(array(
				'user_id' => Auth::id(),
				'image_path' => $dir,
				'image_name' => $filename,
				'image_mime' => $data['file']->getMimeType(),
				'image_ext' => $data['file']->getClientOriginalExtension()
		));
		
		$return['file'] = $return['message']->image()->save($img_data);
		
		$data['file']->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);			
		
		return $return;
	}
	
	/**
	 * 
	 * @param integer $id
	 */
	public function getPost($id) {
		return $this->post->select(array('post_id', 'post_message', 'created_at', 'user_id'))->find($id);
	}
	
	/**
	 *
	 * @param integer $take
	 */
	public function initialNewsFeed($take) {
		$collection = $this->post->select(array('post_id', 'post_message', 'created_at', 'user_id'))->take($take)->latest()->get();
	
		$return = array();
	
		foreach($collection as $single) {
			$return[] = array(
					'message' => $single,
					'file' => $single->image()->select(array('image_id', 'image_path', 'image_name', 'image_ext',))->first(),
					'user' => $single->user()->select(array('registration_id', 'last_name', 'first_name'))->first()
			);
		}
		return $return;
	}
	
}