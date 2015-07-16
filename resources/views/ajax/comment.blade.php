<div class="comment-container">
	<div class="col-lg-1">
		@if(isset($comment->user->prof_pic))
		<a href="{{ Route('profile.view' , ['id' => $comment->user->user_id] ) }}"><img src="{{ mediaSrc($comment->user->prof_pic->image_path , $comment->user->prof_pic->image_name , $comment->user->prof_pic->image_ext) }}" class="profile-pic"></a>
		@else
		<a href="{{ Route('profile.view' , ['id' => $comment->user->user_id] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"></a>
		@endif
	</div>
	<div class="col-lg-11">
		<div class="row">
			<div class="col-lg-6 text-left nopad">
				<a href="#"><span>{{ $comment->user->first_name.' '.$comment->user->last_name}}</span></a>
			</div>
			<div class="col-lg-6 text-right nopad">
				<h6><small>{{ _ago(strtotime($comment->created_at)) }}</small></h6>
			</div>
		</div>
		<div class="row">
			<div class="comment-message">
				{!! $comment->comment_message !!}
			</div>
		</div>
	</div>
	<br clear="all">
</div>