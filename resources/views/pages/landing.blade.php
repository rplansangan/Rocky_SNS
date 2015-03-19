@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 land-content">
	<div class="container">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 land-main-cont">
			<div class="col-sm-12 col-xs-12 col-md-7 col-lg-7 top-pets">
				<h2>Top Pets</h2>
				<ul class="first-top-pet">
					<li><img src="{{ URL::asset('assets/images/browncat.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/garfielking.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/odie.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/odiedif.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/nermal.png') }}"><p>Namename</p></li>

				</ul>

				<ul class="sec-top-pet">
					<li><img src="{{ URL::asset('assets/images/garfielking.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/browncat.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/odiedif.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/nermal.png') }}"><p>Namename</p></li>
					<li><img src="{{ URL::asset('assets/images/odie.png') }}"><p>Namename</p></li>
				</ul>
			</div>

			<div class="col-sm-12 col-xs-12 col-md-5 col-lg-5 reg">
				<h2>Not a member yet?</h2>
				<h3>Register for free</h3>
				<form action="{{ route('register.postInitial') }}" method="POST" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="email_address" class="col-sm-4 control-label">Email Address</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email_address" placeholder="Email Address" required>
						</div>
					</div>
					<div class="form-group">
						<label for="regconfirmemail" class="col-sm-4 control-label">Confirm Email:</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email_address_confirmation" placeholder="Confirm Email" required>
						</div>
					</div>
					<div class="form-group">
						<label for="regfname" class="col-sm-4 control-label">First Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="reglname" class="col-sm-4 control-label">Last Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="regbday" class="col-sm-4 control-label">Birthday:</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" id="birth_date" name="birth_date" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Gender:</label>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="M" checked>
								Male
							</label>
						</div>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="F">
								Female
							</label>
						</div>
					</div>
					<div class="form-group text-right">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Sign Up" class="btn btn-default">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop