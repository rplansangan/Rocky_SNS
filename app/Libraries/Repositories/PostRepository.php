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
		DB::beginTransaction();
		
		try {	
			$post = $this->post->create(array(
					'user_id' => Auth::id(),
					'post_message' => $data['message']
			));
		} catch (\Exception $e) {
			DB::rollback();
			return trans('errors.err_500');
		}
		
		if(isset($file)) {
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			$mime = $file->getMimeType();
			
			try {
				$post->image()->save(new Images(array(
						'user_id' => Auth::id(),
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $file->getMimeType(),
						'image_ext' => $file->getClientOriginalExtension(),
						'image_title' => $data['image_title'],
						'category' => $data['category']
				)));
			} catch (\Exception $e) {
				DB::rollback();
				return trans('errors.err_500');
			}
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
					$q->where('pet_id', 0);
					$q->where('business_id', 0);
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
		
		DB::commit();
		
		return $post;
	}
	
	/**
	 * 
	 * @param integer $id
	 */
	public function getPost($id) {
		return $this->post->select(array('post_id', 'post_message', 'created_at', 'user_id'))->find($id);
	}
	
	public function delete($id) {
		$this->post = $this->post->find($id);
		$this->post->image()->delete();
		$this->post->like()->delete();
		$this->post->comment()->delete();
		return $this->post->delete();
	}
}