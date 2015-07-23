<div>
	<div class="text-center user-details">
		@if(isset($pet[0]->profile_pic))
			<img src="{{ mediaSrc($pet[0]->profile_pic->image_path , $pet[0]->profile_pic->image_name , $pet[0]->profile_pic->image_ext) }}" class="profile-pic">
			@else
			<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
			@endif
			<h3>{{ $pet[0]->pet_name}} <br>
				<small class="text-muted">
				@if(!empty($pet[0]->breed)) 
					{{ $pet[0]->breed }}
				@else 
					breed not indicated
				@endif
				</small>
			</h3>
		<br clear="all">
	</div>
</div>