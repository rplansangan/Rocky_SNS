<div class="petlist-content col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h1>My Pets</h1></legend>

	@foreach($list as $pet)
		<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 petlist-img">
			<a href="{{ route('profile.showPetProfile', array($pet->user_id, $pet->pet_id)) }}"><img src="{{ route('files.get.image', array($pet->user_id, $pet->image[0]->image_id)) }}" width="120px"></a>
		</div>
	
		<div class="col-sm-12 col-xs-12 col-lg-8 col-md-84 petlist-info">
			<a href="{{ route('profile.showPetProfile', array($pet->user_id, $pet->pet_id)) }}"><h4>{{ $pet->pet_name }}</h4></a>
			<dl class="dl-horizontal">
			 	<dt>Type:</dt><dd>{{ $pet->pet_type }}</dd>
				
				<dt>Breed:</dt><dd>{{ $pet->breed }}</dd>
				<dt>Age:</dt>
				<dd>1 year(s) old</dd>
				<dt>Gender:</dt> <dd>@if($pet->pet_gender == 'M') Male @else Female @endif </dd>
			</dl>
		</div>
	@endforeach	
</div>