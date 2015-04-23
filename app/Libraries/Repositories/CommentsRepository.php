<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Comments;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\Notification;

class CommentsRepository {
	
	public function set($postId, $postUId, $message) {
		$comment = Comments::create(array(
				'post_id' => $postId, 
				'comment_message' => $message, 
				'comment_user_id' => Auth::id()
		));
		
		$temp = Comments::where('post_id', $postId)->with('user')->get();
		
		Notification::origin('Comments', Auth::id())
			->destinationId($postUId)
			->notifType('post_comment')
			->params(array('post_id' => $postId))
			->send();
		
		return $temp->last();
	}
}