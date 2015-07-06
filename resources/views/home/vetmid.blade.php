<div class="col-xs-12 vet-mid">
	<div class="row">
		<legend><h3>VETERINARIANS - Still under construction</h3></legend>
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 vet-search">
			<form action="" method="GET" class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-3 control-label">Specialist in:</label>
					<div class="col-sm-3">
						<select name="type" class="form-control">
							<option value="">- Select type -</option>
							<option value="Dog Specialist" >Dog Specialist</option>
							<option value="Cat Specialist" >Cat Specialist</option>
							<option value="Pet Specilaist" >Pet Specilaist</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Country:</label>
					<div class='col-sm-3'>
						{{ country_form() }}
					</div>

					<div class='col-sm-2'>
						<input type='text' name="state_ads" placeholder="STATE" class="form-control" />
					</div>

					<div class='col-sm-2'>
						<input type='text' name="zip_ads" placeholder="ZIP" class="form-control" />
					</div>

					<div class='col-sm-1'>
						<input type='submit' class="btn" name="search" value="SEARCH"/>
					</div>
				</div>
			</form>
		</div>

		<div class="page-header">
			<h2>Veterinaries near you</h2>
		</div>
		<div class="vet-details col-sm-4" style="margin:10px 0;">
			<a href="{{ Route('vetprof') }}"><img width="100%"src="{{ URL::asset('assets/images/vet1.jpg') }}"></a>
			<div class="vet-info">
				<h4><a href="{{ Route('vetprof') }}">Dr. Veterinary One</a></h4>
				<p>Dog Specialist</p>
				<p>Address 123 Bldg. 4F-3, <br> Angeles City, PH</p>
				<p>Contact #: 000 000 000</p>
			</div>
		</div>
		<div class="vet-details col-sm-4" style="margin:10px 0;">
			<a href="{{ Route('vetprof') }}"><img width="100%"src="{{ URL::asset('assets/images/vet2.jpg') }}"></a>
			<div class="vet-info">
				<h4><a href="{{ Route('vetprof') }}">Dr. Veterinary One</a></h4>
				<p>Dog Specialist</p>
				<p>Address 123 Bldg. 4F-3, <br> Angeles City, PH</p>
				<p>Contact #: 000 000 000</p>
			</div>
		</div>
		<div class="vet-details col-sm-4" style="margin:10px 0;">
			<a href="{{ Route('vetprof') }}"><img width="100%"src="{{ URL::asset('assets/images/vet3.jpg') }}"></a>
			<div class="vet-info">
				<h4><a href="{{ Route('vetprof') }}">Dr. Veterinary One</a></h4>
				<p>Dog Specialist</p>
				<p>Address 123 Bldg. 4F-3, <br> Angeles City, PH</p>
				<p>Contact #: 000 000 000</p>
			</div>
		</div>
		<div class="vet-details col-sm-4" style="margin:10px 0;">
			<a href="{{ Route('vetprof') }}"><img width="100%"src="{{ URL::asset('assets/images/vet4.jpg') }}"></a>
			<div class="vet-info">
				<h4><a href="{{ Route('vetprof') }}">Dr. Veterinary One</a></h4>
				<p>Dog Specialist</p>
				<p>Address 123 Bldg. 4F-3, <br> Angeles City, PH</p>
				<p>Contact #: 000 000 000</p>
			</div>
		</div>
	</div>
</div>