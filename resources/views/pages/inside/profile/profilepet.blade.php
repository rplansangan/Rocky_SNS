<div>
	<div class="text-center user-details">
		<!--@if(isset($profileInformation->profile_pic))
			<img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" class="profile-pic">
		@else
			<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
		@endif-->
		<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
		<h3>Tyrion <br><small class="text-muted">Shih Tzu</small></h3>
		<br clear="all">
	</div>
</div>