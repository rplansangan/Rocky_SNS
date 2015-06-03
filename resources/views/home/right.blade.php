<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 right-nav">
		<div class="land-left-found col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<h3><span class="glyphicon glyphicon-hand-right"></span>
				<a href="{{ Route('pets.found.list') }}">Found Pets</a>
			<span class="glyphicon glyphicon-hand-left"></span></h3>
			<div class="found-imgs">
				<a href="#" pet-id=""><img src="{{ route('pets.image.get', array($found_pets->image[0]->image_id)) }}" width="250px" height="185px"></a>
			</div>
		</div>

		<div class="land-right-missing col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<h3><span class="glyphicon glyphicon-hand-right"></span>
				<a href="{{ Route('missing_pets') }}">Missing Pets</a>
			<span class="glyphicon glyphicon-hand-left"></span></h3>
			<div class="missing-imgs">
				<a href="#" pet-id=""><img src="{{ route('pets.image.get', array($missing_pets->profile['image'][0]->image_id)) }}" width="250px" height="185px"></a>
			</div>
		</div>
	</div>
</div>
