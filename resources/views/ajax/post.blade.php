<li class="media">
	<div class="media-left">
		<a href="{{ route('profile.showProfile', $user->registration_id) }}">
			@if(isset($pet->image))	
				<img src="{{ route('files.get.image', array($user->user_id, $user->image[0]->image_id)) }}" width="64px" height="64px" alt="profile picture">
			@else
				<img src="{{ URL::asset('assets/images/owner-default.png') }}" width="64px" height="64px" alt="profile picture">
			@endif
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading">
			<a href="{{ route('profile.showProfile', $user->registration_id) }}">
				{{ $user->first_name }} {{ $user->last_name }}
			</a>
		</h4>
		<small class="media-heading">{{ $message->created_at }}</small>
		<p>{!! $message->post_message !!}</p>
		@if(isset($image))
		<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($message->user_id, $image->image_id)) }}">
		@endif
		<i class="fa fa-thumbs-up"></i>&nbsp;<span class="like-counter">{{{ isset($include_script) ? 0 : count($like) }}} </span> 
		<i class="fa fa-comment"></i>&nbsp;<span class="comment-counter">{{{ isset($include_script) ? 0 : count($comments) }}}</span>&nbsp; 
		<a class="nf-like comment-like" href="#" value="{{ $message->post_id }}" value2="{{ route('likes.set', array($message->post_id)) }}" value3="{{ csrf_token() }}">{{ isLike($like) }} &#8226;</a>
		<a class="nf-like comment-form-btn" href="javascript:void(0)" isClick="Open">Comment</a>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-form comment-form-hidden">
			<br>
			<textarea max="500" name="post_message" class="comment-box" post_id="{{ $message->post_id }}" href="{{ route('comments.set', $message->post_id) }}" _token="{{ csrf_token() }}" placeholder=" Say Something..."></textarea>
			<ul class="comments">
				@if($comments)
					@foreach($comments as $comment)
						@include('ajax.comments', $comment)
					@endforeach
				@endif
			</ul>
		</div>
	</div>
</li>
@if(@$include_script)
	@include('scripts.nf_pagination')
@endif