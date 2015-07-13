<div>
	<div class="text-center">
		<img src="{{ URL::asset('assets/img/vet-large.jpg') }}">
		<h3>Nearest Veterinarian <br><small class="text-muted">Find your nearest petshop or own a petshop with us</small></h3>
		<div class="col-lg-6 col-lg-offset-3 search-input-petshop">
			<span>
				<a href="#">Kuala Lumpur</a>
				<a href="#">Selangor</a>
				<a href="#">Penang</a>
				<a href="#">More Cities..</a>
			</span>
			<input type="text" class="form-control input-lg " placeholder="Search for...">
			<a href="#"><img src="{{ URL::asset('assets/img/search.png') }}"></a>
		</div>
		<br clear="all">
	</div>
</div>

@include('include.newsfeedforpetshop')