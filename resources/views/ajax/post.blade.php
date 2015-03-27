@if($include_script)
<script type="text/javascript">
$('.comment-box').keypress(function (e) {
	var key = e.which;
	if(key == 13) 
	{
		var url = $(this).attr('href');
		var id = $(this).attr('post_id');
		var token = $(this).attr('_token');
		var message = $(this).val();
		var a = this;
		if(message != ""){
			$.ajax({
				url : url,
				type : 'post',
				data: { id:id , _token:token , message:message },
				success: function(r){
					$(a).val('');
					$(a).text('');
					$(a).next().append(r);
				}
			});
		}
	}
});
$(".comment-box" ).elastic();

$('.comment-like').on('click' , function(e){
		var id = $(this).attr('value');
		var url = $(this).attr('value2');
		var token = $(this).attr('value3');
		var a = this;
		$.ajax({
			url : url,
			type : 'post',
			data: {id:id , _token:token},
			success: function(r){
				$(a).children('span').text(r);
			}
		});	
		e.preventDefault();
	});
	$('.comment-form-hidden').hide();
</script>
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
		<img class="col-sm-12" src="{{ route('files.get.image', array($message->user_id, $image->image_id)) }}">
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