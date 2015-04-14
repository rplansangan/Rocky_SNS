<li class="notif-outer {{ $active }}">
{!! trans('profile.friend.request_msg', array('profile_route' => $profile_route, 'name' => $name)) !!}
<form method="POST" action="{{ route('profile.request.add_friend') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="req_id" value="{{ $requesting_id }}">
	<input type="submit" value="{{ trans('profile.friend.request_add') }}" class="btn btn-info">
</form>	
<form method="POST" action="{{ route('profile.request.friend_ignore') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="req_id" value="{{ $requesting_id }}">
	<input type="submit" value="{{ trans('profile.friend.request_ignore') }}" class="btn btn-warning">
</form>
</li>