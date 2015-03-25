<script type="text/javascript">
	$('.comment-box').keypress(function (e) {
		var key = e.which;
		if(key == 13) 
		{
			alert('enjter');
		}
	});
	$(".comment-box" ).elastic();
</script>

<li class="media">
	<div class="media-left">
		<a href="#">
			<img class="media-object" src="{{ URL::asset('assets/images/browncat.png') }}" width="64px" height="64px" alt="profile picture">
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading">
		{{ $user->first_name }} {{ $user->last_name }}
		</h4>
		<small class="media-heading">{{ $message->created_at }}</small>
		<p>{{ $message->post_message }}</p>
		@if(isset($file))
		<img class="col-sm-12" src="{{ route('files.get.image', array($message->user_id, $file->image_id)) }}">
		@endif
		<p><a class="nf-like" href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a> <a class="nf-like" href="javascript:void(0)">Comment</a></p>
		<form method="POST" action="{{ url('login') }}"  role="form" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<textarea max="500" name="post_message" class="comment-box" placeholder=" Say Something..."></textarea>
		</form>	
	</div>
</li>