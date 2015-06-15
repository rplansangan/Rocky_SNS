<li id="post-{{{ $message->post_id }}}" class="nf-post media">
	<input type="hidden" id="del-route" value="{{{ route('posts.del.dispatcher') }}}">
	<div class="media-left">
		<a href="{{ route('profile.showProfile', $user->registration_id) }}">
			@if($user->prof_pic)	
				<img src="{{ route('files.get.image', array($user->prof_pic->user_id, $user->prof_pic->image_id)) }}" width="64px" height="64px" alt="profile picture">
			@else
				<img src="{{ URL::asset('assets/images/owner-default.png') }}" width="64px" height="64px" alt="profile picture">
			@endif
		</a>
	</div>
	<div class="media-body">
		@if(Auth::id() == $message->user_id)
		<button type="button" id="post-del" class="close post-remove" data-label="remove" data-act="post" data-pid="{{{ $message->post_id }}}" token="{{{ csrf_token() }}}">
		<span class="glyphicon glyphicon-remove"></span>
		</button>
		@endif
		<h4 class="media-heading">
			<a href="{{{ route('profile.showProfile', $user->registration_id) }}}">
				{{ $user->first_name }} {{ $user->last_name }}
			</a>
		</h4>
		<small class="media-heading">{{ $message->created_at }}</small>
		@if(isset($image)) 
			<em><h6><small class="help-block">- {{ $image->category }}</small></h6></em>
		@endif
		<hr>
		<p>{!! $message->post_message !!}</p>
		@if(isset($image))
			@if(strstr($image->image_mime, 'image/'))
				<img class="img-responsive" src="{{ route('files.get.image', array($message->user_id, $image->image_id)) }}">
			@elseif(strstr($image->image_mime, 'video/'))
				<video  width="100%" height="240" controls>
				  <source src="{{ route('files.get.image', array($message->user_id, $image->image_id)) }}" type="{{ $image->image_mime }}">
				</video>
			@endif
		@endif
		<div class="likecom-container col-xs-12 col-sm-12 col-m-12 col-lg-12">
			<i class="fa fa-thumbs-up"></i>&nbsp;<span class="like-counter">{{{ ($like === 0) ? 0 : $like->count() }}}</span> 
			<i class="fa fa-comment"></i>&nbsp;<span class="comment-counter">{{{ ($comments === 0) ? 0 : $comments->count() }}}</span>&nbsp; 
			@if(!@$public)
				<a class="nf-like comment-like" href="#" puid="{{{ $message->user_id }}}" value="{{{ $message->post_id }}}" value2="{{{ route('likes.set', array($message->post_id)) }}}" value3="{{{ csrf_token() }}}">{{ isLike($like) }} &#8226;</a>
			@endif
			<a class="nf-like comment-form-btn" href="javascript:void(0)" isClick="Open">Comment</a>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-form comment-form-hidden">
				<br>
				@if(!@$public)
					<textarea max="500" name="post_message" class="comment-box" puid="{{{ $message->user_id }}}" post_id="{{{ $message->post_id }}}" href="{{{ route('comments.set', $message->post_id) }}}" _token="{{{ csrf_token() }}}" placeholder=" Say Something..."></textarea>
				@endif
				<ul class="comments">
					@if($comments)
						@foreach($comments as $comment)
							@include('ajax.comments', array('comment' => $comment, 'pid' => $message->post_id, 'puid' => $message->user_id))
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>
</li>
@if(@$include_script)
	@include('scripts.nf_pagination')
@endif