<div class="petlist-content col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h1>My Pets</h1></legend>

	@if($list->isEmpty())
		<p>No pets yet.</p>
		<p>Please add your pet(s) by clicking the gear icon and then the add a pet button</p>
	@else
		@foreach($list as $pet)
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 petlist-container">
			<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 petlist-img">
				<a href="{{ route('profile.showPetProfile', array($pet->user_id, $pet->pet_id)) }}">
					@if(isset($pet->profile_pic))	
						<img src="{{ route('files.get.image', array($pet->user_id, $pet->image[0]->image_id)) }}" width="120px">
					@else
						<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="120px">
					@endif
				</a>
			</div>
			<div class="col-sm-12 col-xs-12 col-lg-8 col-md-8 petlist-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<a href="{{ route('profile.showPetProfile', array($pet->user_id, $pet->pet_id)) }}"><h4>{{ $pet->pet_name }}</h4></a>
				<dl class="dl-horizontal">
				 	<dt>Type:</dt><dd>{{ $pet->pet_type }}</dd>					
					<dt>Breed:</dt><dd>{{ $pet->breed }}</dd>
					<dt>Bday:</dt><dd>{{ $pet->pet_bday }}</dd>
					<dt>Gender:</dt> <dd>@if($pet->pet_gender == 'M') Male @else Female @endif </dd>
				</dl>
			</div>
		</div>
		@endforeach
	@endif
</div>