<div>
	<div class="text-center">
		<img src="{{ URL::asset('assets/img/paw-large.jpg') }}">
		<h3>Owner's Pets <br><small class="text-muted">Virtually visit your neighbor's cute pets here</small></h3>
		<div class="col-lg-6 col-lg-offset-3 search-input-petlist">
			<input type="text" class="form-control input-lg " placeholder="Search for...">
			<a href="#"><img src="{{ URL::asset('assets/img/search.png') }}"></a>
		</div>
		<br clear="all">
	</div>
</div>


<div class="notthis video-list text-center">
	<div class="col-lg-4">
		<div>
			<img src="{{ URL::asset('assets/images/neigh5.jpg') }}" class="img-responsive">
			<h4><a href="{{ route('profile.showPetProfile') }}">Tyrion</a><br><small>Shih Tzu</small></h4>
			<div class="col-lg-12 nopad">
				<small>05/05/2015</small>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div>
			<img src="{{ URL::asset('assets/images/neigh6.jpg') }}" class="img-responsive">
			<h4><a href="{{ route('profile.showPetProfile') }}">Mulder</a><br><small>Golden Retriever</small></h4>
			<div class="col-lg-12 nopad">
				<small>05/05/2015</small>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div>
			<img src="{{ URL::asset('assets/images/neigh7.jpg') }}" class="img-responsive">
			<h4><a href="{{ route('profile.showPetProfile') }}">Coffee</a><br><small>Shih Tzu</small></h4>
			<div class="col-lg-12 nopad">
				<small>05/05/2015</small>
			</div>
		</div>
	</div>
</div>