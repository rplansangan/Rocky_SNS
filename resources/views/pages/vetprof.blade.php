@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 vet-prof">
		<div class="vetprof-left-info col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<img src="{{ URL::asset('assets/images/vet1.jpg') }}">
			<h3>Dr. VEterinary One</h3>
			<h4>Dog Specialist</h4>
			<p>Address 123 Bldg. 4F-3, <br> Angeles City, PH</p>
			<a style="color: inherit" href="tel:000 000 000">Contact No: 000 000 000</a>
		</div>

		<div class="vet-booking-right col-sm-12 col-xs-12 col-lg-6 col-md-6 text-left">
			<h3>Book your schedule here:</h3>
			<form action="" method="GET" class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-3 control-label">First Name:</label>
					<div class="col-sm-8">
						<input type="text" name="first_name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Last Name:</label>
					<div class="col-sm-8">
						<input type="text" name="last_name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email Address:</label>
					<div class="col-sm-8">
						<input type="email" name="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type of pets:</label>
					<div class="col-sm-8">
						<input type="text" name="type_pets" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Number of pets:</label>
					<div class="col-sm-8">
						<input type="text" name="number_pets" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Schedule:</label>
					<div class="col-sm-8">
						<input class="form-control datepicker" type="date" name="sched">
					</div>
				</div>
				<div class="form-group text-left">
					<label class="col-sm-12 control-label pay">Method of payment:</label>
					<div class="radio col-sm-3">
						<label>
							<input type="radio" name="payment" value="online">
							Pay online
						</label>
					</div>
					<div class="radio col-sm-3">
						<label>
							<input type="radio" name="payment" value="card">
							Credit card
						</label>
					</div>
					<div class="radio col-sm-3">
						<label>
							<input type="radio" name="payment" value="bank">
							Bank transfer
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class='col-sm-8 col-sm-offset-3 text-right'>
						<input type='submit' class="btn" value="Submit"/>
					</div>
				</div>
			</form>
			<p style="color: #AB1000; font-weight: bold;">NOTE: Dates that are red in colour are not available.</p>
		</div>
	</div>
</div>
@stop