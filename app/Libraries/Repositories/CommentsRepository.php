<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Comments;
use Illuminate\Support\Facades\Auth;

class CommentsRepository {
	
	public function set($data) {
		$comment = Comments::create(array(
				'post_id' => $data['id'], 
				'comment_message' => $data['message'], 
				'comment_user_id' => Auth::id()
		));
		
		$temp = Comments::where('post_id', $data['id'])->with('user')->get();
		
		return $temp->first();
	}
}