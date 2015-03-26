@foreach($newsfeed as $single)
	@include('ajax.post', array(
		'user' => $single->user, 
		'message' => $single, 
		'image' => $single->image, 
		'like' => $single->like, 
		'comments' => $single->comment,
		'include_script' => false
	))
@endforeach