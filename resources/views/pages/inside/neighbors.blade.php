<div>
	<div class="text-center">
		<img src="{{ URL::asset('assets/img/neighbors-large.jpg') }}">
		<h3>Your Neighbors <br><small class="text-muted">Virtually visit your neighbors here</small></h3>
		<p>you currently have 0 neighbor(s)</p>
		<div class="col-lg-6 col-lg-offset-3 search-input-petshop">
			<span>
				<a href="#">Kuala Lumpur</a>
				<a href="#">Selangor</a>
				<a href="#">Penang</a>
				<a href="#">More Cities..</a>
			</span>
			<form action="{{ route('neighbors.search') }}" method="GET" id="searchNeighborForm">
				<input type="text" class="form-control input-lg " name="neighbors" placeholder="Search for...">
				<a href="javascript:void(0);" id="neighborSearch"><img src="{{ URL::asset('assets/img/search.png') }}"></a>
			</form>
		</div>
		<br clear="all">
	</div>
</div>
