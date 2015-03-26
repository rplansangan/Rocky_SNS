<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Likes;
use Illuminate\Support\Facades\Auth;

class LikeRepository {
	
	public function set($post_id) { 
		$q = Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->get();
		if($q->isEmpty()) {
			Likes::create(array('post_id' => $post_id, 'like_user_id' => Auth::id()));
		} else {
			Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->delete();
		}
	
		return $this->countLikes($post_id);
	}
	
	protected function countLikes($post_id) {
		$count = Likes::where('post_id', $post_id)->count();
	
		if($count == 0) {
			return 'Like';
		} else if($count == 1) {
			return $count . ' Like';
		} else {
			return $count . ' Likes';
		}
	}
}
