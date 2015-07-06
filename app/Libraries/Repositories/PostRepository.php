<?php namespace SNS\Libraries\Repositories;

use Carbon\Carbon;
use SNS\Models\Posts;
use SNS\Models\Images;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\StorageHelper;
use Illuminate\Support\Facades\DB;

/**
 * 
 * @author Rap
 *
 */
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
			$post = $this->post->create([
					'user_id' => Auth::id(),
					'post_message' => $data['message']
			]);
		} catch (\Exception $e) {
			DB::rollback();
			return trans('errors.err_500');
		}
		
		if(isset($file)) {
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			$mime = $file->getMimeType();
			
			try {
				$post->image()->save(new Images([
						'user_id' => Auth::id(),
						'image_path' => $dir['front'],
						'image_name' => $filename,
						'image_mime' => $mime,
						'image_ext' => $file->getClientOriginalExtension(),
						'image_title' => $data['image_title'],
						'category' => $data['category']
				]));
			} catch (\Exception $e) {
				DB::rollback();
				return trans('errors.err_500');
			}
			
			// file visibility issue
// 			StorageHelper::store($dir, $filename . '.' . $file->getClientOriginalExtension());			
			
			// should be changed for cdn support
			try {
    			$file->move(public_path() . $dir['root'] , $filename . '.' . $file->getClientOriginalExtension());
    			$filePath = public_path() . $dir['root'] .'/'. $filename . '.' . $file->getClientOriginalExtension() ;
                
//     			if(strstr($mime, 'video/')){
//     				createThumbnail($filePath , public_path() . '/' . $dir , $filename);
//     			}
			} catch (\Exception $e) {
			    DB::rollback();
			    return trans('errors.err_500');
			}
		}
		
		DB::commit();
		
		$post->load([
				'user' => function($q) {
					$q->addSelect(['registration_id', 'user_id', 'first_name', 'last_name']);
				},
				'user.prof_pic' => function($q) {
					$q->addSelect(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext']);
					$q->where('is_profile_picture', 1);
					$q->where('pet_id', 0);
					$q->where('pfa_id', 0);
					$q->where('business_id', 0);
				},
				'image' => function($q) {
					$q->addSelect(['image_id', 'post_id', 'image_mime' , 'category', 'image_path', 'image_name', 'image_ext']);
				},
				'like' => function($q) {
					$q->addSelect(['like_id', 'post_id']);
				},
				'comment' => function($q) {
					$q->addSelect(['comment_id', 'post_id']);
				}
		]);	
		
		return $post;
	}
	
	/**
	 * 
	 * @param integer $id
	 */
	public function getPost($id) {
		return $this->post->select(['post_id', 'post_message', 'created_at', 'user_id'])->find($id);
	}
	
	public function delete($id) {
		$this->post = $this->post->find($id);
		$this->post->image()->delete();
		$this->post->like()->delete();
		$this->post->comment()->delete();
		return $this->post->delete();
	}
}