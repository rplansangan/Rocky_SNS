@extends('notifications.container', array(
	'route' => $profile_route,
	'active' => $active,
	'message' => trans('profile.friend.request_msg', array('name' => $name))
))

@section('opt_contents')
<form method="POST" action="{{ route('profile.request.add_friend') }}">
	<input type="hidden" name="req_id" value="{{ $requesting_id }}">
	<input type="submit" value="{{ trans('profile.friend.request_add') }}" class="btn btn-info">
</form>	
<form method="POST" action="{{ route('profile.request.friend_ignore') }}">
	<input type="hidden" name="req_id" value="{{ $requesting_id }}">
	<input type="submit" value="{{ trans('profile.friend.request_ignore') }}" class="btn btn-warning">
</form>
@stop