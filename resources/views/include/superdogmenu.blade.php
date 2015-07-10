<div class="left-cont col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="first-left-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul>
			<?php 
				if(Auth::check()){
					?>
						<li><a href="{{ route('uc') }}"><img src="{{ mediaSrc($profile->prof_pic->image_path , $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" width="38px"><?php echo $profile->first_name.' '.$profile->last_name?></a></li>
					<?php
				}else{
					?>
						<li><img src="{{ URL::asset('assets/images/default-pic.png') }}" width="38px" style="border-radius: 6px;">&nbsp; Guest</li>
					<?php
				}
			?>

			<?php 
				if(Auth::check()){
					?>
						<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/edit-prof-icon.png') }}" width="38px">Edit Profile</a></li>
					<?php
				}
			?>
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/images/new/npet-icon.png') }}" width="38px">Nearest Petshop</a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/images/new/nvet-icon.png') }}" width="38px">Nearest Vet</a></li>
		</ul>
	</div>
	<div class="sec-left-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h6>VIEW AS</h6>
			@if(isset($my_pets))
				@if(!$my_pets->isEmpty())
				<ul>
					@foreach($my_pets as $row)
						<li><a href="#"><img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" width="38px">{{ $row->pet_name }}</a></li>
					@endforeach
				</ul>
				@else
					<div class="text-center">
						<p>No Pets</p>
					</div>
				@endif
			@endif

			<?php 
				if(Auth::check()){
					?>
						<div class="text-left" style="margin: 10px 0;">
							<a href="#" class="add-pets-btn" style="color: #b7062b; padding: 0 15px;"><i class="fa fa-plus"></i> Add Pets</a>
						</div>
					<?php
				}else{
					?>
						<div class="text-left" style="margin-bottom: 10px;">
							<a href="#" style="color: #b7062b; padding: 0 15px;">Login to add pets</a>
						</div>
					<?php
				}
			?>
	</div>
	<div class="third-left-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h6>WHAT TO WATCH</h6>
		<ul>
			<?php 
				if(Auth::check()){
					?>
						<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/uploads.png') }}" width="38px">My Uploads</a></li>
					<?php
				}
			?>
			<li><a href="{{ route('public.dogsoftheweek') }}"><img src="{{ URL::asset('assets/images/new/dogsweek.png') }}" width="38px">Dogs of the week</a></li>
			<?php 
				if(Auth::check()){
					?>
						<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/history.png') }}" width="38px">History</a></li>
					<?php
				}
			?>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/ranger.png') }}" width="38px">Rocky Ranger</a></li>
		</ul>
	</div>
	<div class="four-left-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h6>MY NEIGHBORS</h6>
		<?php 
		if(Auth::check()){
			?>
				<ul>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/husky.png') }}" width="38px">Husky33</a></li>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/bull.png') }}" width="38px">Bull</a></li>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/twins.png') }}" width="38px">Twins</a></li>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/boby.png') }}" width="38px">Bobby</a></li>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/rosey.png') }}" width="38px">Rosey</a></li>
					<li><a href="#"><img src="{{ URL::asset('assets/images/new/brownie.png') }}" width="38px">Brownie</a></li>
				</ul>
			<?php
		}else{
			?>
				<div class="text-left">
					<a href="#" style="color: #b7062b; padding: 0 15px;">Login to see Neighbors</a>
				</div>
			<?php
		}
		?>
	</div>
</div>