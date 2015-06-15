@if(Auth::id() == $profile->user_id)
	@include('forms.create_post')
@endif
<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend>{{ $profile->registration->first_name }} {{$profile->registration->last_name}}'s feed</legend>
	<input type="hidden" id="route-newsfeed-refresh" value="{{ route('newsfeed.refresh') }}" _token="{{ csrf_token() }}">
	@include('iterators.posts', array('newsfeed' => $posts , 'public' => false))
</div>