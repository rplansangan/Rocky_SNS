@if($include_script)
@include('scripts.nf_pagination')
@endif

<li class="media">
	<div class="media-left">
		<a href="{{ route('profile.showProfile', $user->registration_id) }}">
			<img class="media-object" src="{{ URL::asset('assets/images/jon.jpg') }}" width="64px" height="64px" alt="profile picture">
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading">
			<a href="{{ route('profile.showProfile', $user->registration_id) }}">
				{{ $user->first_name }} {{ $user->last_name }}
			</a>
		</h4>
		<small class="media-heading">{{ $message->created_at }}</small>
		<p>{{ $message->post_message }}</p>
		@if(isset($image))
		<img class="col-sm-12 img-thumbnail" src="{{ route('files.get.image', array($message->user_id, $image->image_id)) }}">
		@endif
			<a class="nf-like comment-like" href="#" value="{{ $message->post_id }}" value2="{{ route('likes.set', array($message->post_id)) }}" value3="{{ csrf_token() }}">
			<i class="fa fa-thumbs-up"></i>
				<span class="like-counter">					
					@if((count($like) == 1) && ($like != FALSE))
						1 Like
					@elseif(count($like) > 1)	
						{{ count($like) }} Likes
					@endif
				</span>
			</a>
			<a class="nf-like comment-form" href="javascript:void(0)">
				@if($comments)
					@if(count($comments) == 0)
						Comment
					@elseif(count($comments) == 1)
						1 Comment
					@else
						{{ count($comments) }} Comments
					@endif					
				@endif
			</a>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-form comment-form-hidden">
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