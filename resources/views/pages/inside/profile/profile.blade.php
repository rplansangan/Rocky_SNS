@if(!empty($profileInformation))
	<div>
		<div class="text-center user-details">
			@if(isset($profileInformation->prof_pic))
				<img src="{{ mediaSrc($profileInformation->prof_pic->image_path, $profileInformation->prof_pic->image_name , $profileInformation->prof_pic->image_ext) }}" class="profile-pic">
			@else
				<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
			@endif
			<h3>{{ $profileInformation->first_name.' '.$profileInformation->last_name }} <br><small class="text-muted"></small></h3>
			<div class="prof-btns">
				<a href="#" class="add-neighbor"><i class="fa fa-user-plus"></i> Add as a neighbor</a>
				<a href="#" class="send-msg"><i class="fa fa-envelope-o"></i> Send a message</a>
				<a href="{{ route('profile.petslist') }}" class="user-pets"><i class="fa fa-paw"></i> {{ $profileInformation->first_name.' '.$profileInformation->last_name }}'s Pets</a>
			</div>
			<br clear="all">
		</div>
	</div>

	@if(Auth::id() == $id)
		@include('include.formPost')
	@endif
	@include('include.newsfeed')
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif