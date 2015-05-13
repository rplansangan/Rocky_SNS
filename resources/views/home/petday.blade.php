<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pet-day-container">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pd-content">
		<h1>PET OF THE DAY</h1>

		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pd-photo">
			<a href="#"><img width="250px"src="{{ URL::asset('assets/images/dog4.jpg') }}"></a>
		</div>

		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pd-name">
			<a href="#"><h2>Mypet Name</h2></a>
		</div>

		<div class="col-lg-12 pd-infos">
			<dl class="dl-horizontal pd-infos-text">
			 	<dt>Type:</dt> <dd>Cat</dd>					
				<dt>Breed:</dt> <dd>Domestic</dd>
				<dt>Bday:</dt> <dd>2013-02-02 00:00:00</dd>
				<dt>Gender:</dt> <dd>Male</dd>
				<dt>Likes:</dt> <dd>Lasagna</dd>
				<dt>Dislikes:</dt> <dd>Vegetables</dd>
				<dt>Food:</dt> <dd>Lasagna, Pizza</dd>
				<dt>Owner:</dt> <dd>{{ Auth::user()->registration->first_name }} {{ Auth::user()->registration->last_name }}</dd>
			</dl>
		</div>
	</div>
</div>
