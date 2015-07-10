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
		
		$temp = Comments::where('post_id', $postId)->with(array(
					'user', 
					'user.prof_pic' => function($q) {
						$q->addSelect(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext']);
						$q->where('pet_id', 0);
						$q->where('pfa_id', 0);
						$q->where('is_profile_picture', 1);
				}))->get();
		
		if(Auth::id() != $postUId) {		
			Notification::origin('Comments', Auth::id())
				->destinationId($postUId)
				->notifType('post_comment')
				->params(array('post_id' => $postId))
				->send();
		}
		
		return $temp->last();
	}
	
	public function delete($postId, $postUId, $commentId) {
		Comments::find($commentId)->delete();
		
		Notification::origin('Comments', Auth::id())
			->destinationId($postUId)
			->notifType('post_comment')
			->params(array('post_id' => $postId))
			->delete();
	}
}