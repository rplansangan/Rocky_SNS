<div class="row" style="margin:10px;">
	<div class="col-sm-6">
		<img class="img-responsive" src="{{ route('files.get.image', array($info->image[0]->user_id, $info->image[0]->image_id)) }}">
	</div>
	<div class="col-sm-6">
		<dl>
		  <dt>Name:</dt>
		  <dd>{{ $info['pet_name'] }}</dd>
		  <dt>Anime Type</dt>
		  <dd>{{ @$info->pet_type['animal'] }}</dd>
		  <dt>Gender</dt>
		  <dd>{{ $info['pet_gender'] }}</dd>
		  <dt>Weight & Height</dt>
		  <dd>{{ $info['weight'].' '.$info['height'].' ' }}</dd>
		  <dt>Behavior</dt>
		  <dd>{{ $info->pet_behavior['behavior']}}</dd>
		  <dt>Foods</dt>
		  <dd>{{ $info->pet_food['brand_name']}}</dd>
		  <dt></dt>
		  <dd>{{ $info['food_style'] }} | {{ $info['feeding_interval'] }} | {{ $info['feeding_time'] }}</dd>
		</dl>
	</div>
	<div class="col-sm-12">
		<legend>Pet marks</legend>
		@foreach($info->foundpets[0]->image as $row)
			<div class="col-sm-4">
				<img class="img-responsive" src="{{ route('pets.image.get', array($row->image_id)) }}">
			</div>
		@endforeach
	</div>
</div>