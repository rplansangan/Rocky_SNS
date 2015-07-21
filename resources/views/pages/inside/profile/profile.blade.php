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
				@if(Auth::id() != $profileInformation->user_id)
					@if($friend_flags->friendRequest())	
						<a href="#" id="add_neighbor" route="{{ Route('profile.request.friend') }}" user_id="{{ $profileInformation->user_id }}" data-act="req"><i class="fa fa-user-plus"></i> <span id="friendStatusText">{{ trans('profile.friend.is_pending') }}</span></a>								
					@elseif(!$friend_flags->isFriend())
						<a href="#" id="add_neighbor" route="{{ Route('profile.request.friend') }}" user_id="{{ $profileInformation->user_id }}" data-act="add"><i class="fa fa-user-plus"></i> <span id="friendStatusText">{{ trans('profile.friend.add_friend') }}</span></a>
					@else
						<a href="#" id="add_neighbor" route="{{ Route('profile.request.friend') }}" user_id="{{ $profileInformation->user_id }}" data-act="canc"><i class="fa fa-user-times"></i> <span id="friendStatusText">{{ trans('profile.friend.delete_friend') }}</span></a>
					@endif
					<a href="#" id="send_msg"><i class="fa fa-envelope-o"></i> Send a message</a>
				@endif
				<a href="{{ route('profile.petslist' , ['user_id' => $profileInformation->user_id]) }}" id="user_pets"><i class="fa fa-paw"></i> 
					@if(Auth::id() == $profileInformation->user_id) 
					My Pets
					@else
					{{ $profileInformation->first_name.' '.$profileInformation->last_name }}'s Pets
					@endif
				</a>
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