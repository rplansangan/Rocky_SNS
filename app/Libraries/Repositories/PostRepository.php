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
			
			try{
				$post->image()->save(new Images([
						'user_id' => Auth::id(),
						'image_path' => $dir['front'],
						'image_name' => $filename,
						'image_mime' => $mime,
						'image_ext' => $file->getClientOriginalExtension()
				]));
			$file->move(public_path() . $dir['root'] , $filename . '.' . $file->getClientOriginalExtension());
    		$filePath = public_path() . $dir['root'] .'/'. $filename . '.' . $file->getClientOriginalExtension() ;

    		createThumbnail($filePath , $filename);

			}catch (\Exception $e) {
				DB::rollback();
				return trans('errors.err_500');
			}
		}
		
		DB::commit();
		
		$post->load(['user', 'user.prof_pic', 'image', 'like']);	
		
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