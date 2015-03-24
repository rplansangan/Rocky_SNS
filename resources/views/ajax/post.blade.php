<li class="media">
	<div class="media-left">
		<a href="#">
			<img class="media-object" src="{{ URL::asset('assets/images/browncat.png') }}" withd="64px" height="64px" alt="profile picture">
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading"></h4>
		<small class="media-heading">March 18 2015 12:00:00 am</small>
		<p>{{ $info['post_message'] }}</p>
		<p><a href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a> <a href="javascript:void(0)">Comment</a></p>
		<form method="POST" action="{{ url('login') }}"  role="form" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<textarea max="500" name="post_message" class="comment-box" placeholder=" Say Something..."></textarea>
		</form>	
	</div>
</li>