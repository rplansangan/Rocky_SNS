@if(!empty($profileInformation))
	
	@include('pages.inside.profile.profilehead')

	<div class="petslistcont text-center">
		@if(isset($pet) AND !$pet->isEmpty())
			<div class="page-header">
				<h2>{{ $title }} Pets</h2>
			</div>
			@foreach($pet as $row)
				<div class="col-lg-12 nopad">
					<div>
						@if(isset($row->profile_pic))
							<img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext ) }}" class="img-responsive">
						@else
							<img src="{{ URL::asset('assets/images/neigh5.jpg') }}" class="img-responsive" style="margin:0 auto;">
						@endif
						<h4><a href="{{ route('profile.showPetProfile' ,['user_id' => $id , 'pet_id' => $row->pet_id ]) }}">{{ $row->pet_name }}</a><br><small>{{ $row->breed }}</small></h4>
						<div class="col-lg-12 nopad">
							<small>{{ $row->pet_bday }}</small>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<div>
				<h2>No Pets</h2>
			</div>
		@endif
	</div>
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif
