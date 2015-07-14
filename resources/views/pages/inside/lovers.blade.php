@include('include.formPost')

@if(!$newsfeed->isEmpty())
	@foreach($newsfeed as $row)
		@include('include.newsfeed')
	@endforeach
@else
	<div class="text-center"><p>No Post</p></div>
@endif

