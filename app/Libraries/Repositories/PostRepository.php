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
	
	public function setPost($data) {
		// checks if user has uploaded any file
		if(array_key_exists('file', $data) && $data['file'] != null) {
			$file = $data['file'];
			$data = array_except($data, array('file'));
		}
		
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
					'image_title' => $data['image_title']
			)));
			
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
					$q->addSelect(array('image_id', 'post_id', 'image_mime' , 'image_title'));
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
		
		$return['image'] = $return['message']->image()->save($img_data);
		
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
	 * Gets initial items for news feed
	 * @param integer $take
	 */
	public function initialNewsFeed($id, $take) {
		if(!$id) {
			return $this->post->with(array(
				'user' => function ($q) {
					$q->addSelect(array('registration_id', 'first_name', 'last_name'));
				},
				'image' => function ($q) {
					$q->addSelect(array('image_id', 'post_id'));
				},
				'like' => function ($q) {
					$q->addSelect(array('like_id', 'post_id' , 'like_user_id'));
				},
				'comment' => function ($q) {
					$q->addSelect(array('comment_id', 'post_id' ,'comment_message', 'comment_user_id'));
				},
				'comment.user' => function ($q) {
					$q->addSelect(array('registration_id', 'first_name', 'last_name'));
				}))->where('advertise_id' , ' = ' , 0)->take($take)->latest()->get();
		}
		
		return $this->post
		->where('user_id', $id)
		->with(array(
			'user' => function ($q) {
				$q->addSelect(array('registration_id', 'first_name', 'last_name'));
			},
			'image' => function ($q) {
				$q->addSelect(array('image_id', 'post_id'));
			},
			'like' => function ($q) {
				$q->addSelect(array('like_id', 'post_id' , 'like_user_id'));
			},
			'comment' => function ($q) {
				$q->addSelect(array('comment_id', 'post_id' ,'comment_message', 'comment_user_id'));
			},
			'comment.user' => function ($q) {
				$q->addSelect(array('registration_id', 'first_name', 'last_name'));
			}))->where('advertise_id' , ' = ' , 0)->take($take)->latest()->get();
	}
	
	/**
	 * Gets news feed items given an offset
	 * @param integer $skip
	 * @param integer $take
	 */
	public function incrementalNewsFeed($skip, $take) {		
		return $this->post->with(array(
			'user' => function ($q) {
				$q->addSelect(array('registration_id', 'first_name', 'last_name'));
			},
			'image' => function ($q) {
				$q->addSelect(array('image_id', 'post_id'));
			},
			'like' => function ($q) {
				$q->addSelect(array('like_id', 'post_id' , 'like_user_id' ));
			},
			'comment' => function ($q) {
				$q->addSelect(array('comment_id', 'post_id' ,'comment_message', 'comment_user_id'));
			},
			'comment.user' => function ($q) {
				$q->addSelect(array('registration_id', 'first_name', 'last_name'));
			}))->skip($skip)->take($take)->latest()->get();
	}
	
}