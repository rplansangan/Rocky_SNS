<?php namespace SNS\Libraries\Repositories;

use Carbon\Carbon;
use SNS\Models\Posts;
use SNS\Models\Images;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\StorageHelper;

class PostRepository { 
	
	/**
	 * 
	 * @var SNS\Models\Posts
	 */
	protected $post;
	
	public function __construct() {
		$this->post  = new Posts();
	}
	
	public function setPost($data, $file) {	
		$post = $this->post->create(array(
				'user_id' => Auth::id(),
				'post_message' => $data['message']
		));
		
		if(isset($file)) {
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			$mime = $file->getMimeType();
			$post->image()->save(new Images(array(
					'user_id' => Auth::id(),
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension(),
					'image_title' => $data['image_title'],
					'category' => $data['category']
			)));
			
			// file visibility issue
// 			StorageHelper::store($dir, $filename . '.' . $file->getClientOriginalExtension());

			$file->move(storage_path('app') . '/' . $dir , $filename . '.' . $file->getClientOriginalExtension());
			$filePath = storage_path('app') . '/' . $dir .'/'. $filename . '.' . $file->getClientOriginalExtension() ;

			if(strstr($mime, 'video/')){
				createThumbnail($filePath , storage_path('app') . '/' . $dir , $filename);
			}
		}
		
		$post->load(array(
				'user' => function($q) {
					$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
				},
				'user.prof_pic' => function($q) {
					$q->addSelect(array('image_id', 'user_id', 'image_mime', 'is_profile_picture'));
					$q->where('is_profile_picture', 1);
				},
				'image' => function($q) {
					$q->addSelect(array('image_id', 'post_id', 'image_mime' , 'image_title' , 'category'));
				},
				'like' => function($q) {
					$q->addSelect(array('like_id', 'post_id'));
				},
				'comment' => function($q) {
					$q->addSelect(array('comment_id', 'post_id'));
				}
		));
		
		return $post;
	}
	
	/**
	 * 
	 * @param integer $id
	 */
	public function getPost($id) {
		return $this->post->select(array('post_id', 'post_message', 'created_at', 'user_id'))->find($id);
	}
}