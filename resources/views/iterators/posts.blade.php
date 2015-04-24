<input type="hidden" id="nf-del" value="{{{ route('comments.del') }}}">
<ul id="home-newsfeed" class="media-list append-post col-sm-12 col-xs-12 col-lg-12 col-md-12">
	@if($newsfeed->isEmpty())
		<li><p>No posts yet</p></li>
	@else
		<li>
			@foreach($newsfeed as $single)
				@include('ajax.post', array(
					'user' => $single->user, 
					'message' => $single->post, 
					'image' => $single->image, 
					'like' => $single->like, 
					'comments' => $single->comment,
				))
			@endforeach
		</li>
	@endif
</ul>