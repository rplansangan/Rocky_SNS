@foreach($newsfeed as $single)
	@include('ajax.post', array(
		'user' => $single->user, 
		'message' => $single->post, 
		'image' => $single->image, 
		'like' => $single->like, 
		'comments' => $single->comment,
		'public' => $single->public
	))
@endforeach
@include('scripts.nf_pagination')