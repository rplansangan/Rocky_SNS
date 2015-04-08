@if(isset($profile->profile_pic))
	<img src="{{ route('files.get.image', array($profile->user_id, $profile->profile_pic->image_id)) }}">
@else
	<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="120px">
@endif
<pre>{{ print_r($profile) }}</pre>