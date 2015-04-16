<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Newsfeed_view;

class NewsfeedRepository {
	
	protected $nf;
	
	public function __construct() {
		$this->nf = new Newsfeed_view();
	}
	
	public function initial($id, $post_uid, $take = null) {
		if($post_uid != null) {	
			return $this->nf->ofUser($id)->ofPostUID($post_uid)->with(array(
					'post' => function ($q) {
						$q->addSelect(array('post_id', 'user_id', 'post_message', 'created_at'));
					},
					'user' => function ($q) {
						$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
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
					}
			))->latest()->take($take)->get();
		}
		
		return $this->nf->ofUser($id)->with(array(
				'post' => function ($q) {
					$q->addSelect(array('post_id', 'user_id', 'post_message', 'created_at'));
				},
				'user' => function ($q) {
					$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
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
				}
		))->latest()->take($take)->get();
	}
	
	public function incremental($id, $skip, $post_uid = null, $take = null) {
		if($post_uid != null) {
			return $this->nf->ofUser($id)->ofPostUID($post_uid)->with(array(
					'post' => function ($q) {
						$q->addSelect(array('post_id', 'user_id', 'post_message', 'created_at'));
					},
					'user' => function ($q) {
						$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
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
					}
			))->latest()->skip($skip)->take($take)->get();
		}		
		return $this->nf->ofUser($id)->with(array(
				'post' => function ($q) {
					$q->addSelect(array('post_id', 'user_id', 'post_message', 'created_at'));
				},
				'user' => function ($q) {
					$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
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
				}
		))->latest()->skip($skip)->take($take)->get();
	}
}