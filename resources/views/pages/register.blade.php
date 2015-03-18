@extends('master')
@section('content')
<div class="container-fluid">
	<!--<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
		@include('sidebar')
	</div>-->
	<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 land-main-cont register-main">
		<div class="row">
			<div class="page-header">
				<h2>Welcome to Rocky Superdog</h2>
				<small class="help-block">Please complete the final step in joining the most friendly pet community on the net</small>
			</div>
		</div>
		<div class="row">
			<form method="POST" action="{{ url('login') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name:</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
					</div>
					<div class="col-sm-4">
						<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Birthdate:</label>
					<div class='col-sm-8'>
						<input type="date" class="form-control" id="regbday" name="birth_date" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Gender:</label>
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
				<div class="form-group">
					<div class="row">
						<label class="col-sm-2 control-label">Address:</label>
						<div class="col-sm-8">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line1" placeholder="Address 1" rows="3"></textarea>
							</div>
						</div>
					</div>
					<br clear="all">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line2" placeholder="Address 2" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">City</label>
					<div class='col-sm-8'>
						<input type='text' name="city" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Zip Code</label>
					<div class='col-sm-8'>
						<input type='text' name="zip" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">State/Province</label>
					<div class='col-sm-8'>
						<select name="state" class="form-control">
							<option></option>
							<option>Pampanga</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Country</label>
					<div class='col-sm-8'>
						<select name="country" class="form-control">
							<option></option>
							<option>Philippines</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Area Code</label>
					<div class='col-sm-2'>
						<select name="phone_area_code" class="form-control">
							<option>123</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Phone</label>
					<div class='col-sm-2'>
						<select name="phone_country_code" class="form-control">
							<option>63</option>
						</select>
					</div>
					<div class='col-sm-6'>
						<input type='text' name="phone_number" placeholder="Phone Number" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Profile Picture</label>
					<div class='col-sm-8'>
						<input type='file' name="userfile" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 text-center">Please help us grow our community <br> Invite as many as your friends to join Rocky Superdog Community</label>
					<div class="col-sm-8 col-sm-offset-2">
						<textarea class="form-control" placeholder="Email , Email etc" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class='col-sm-8 col-sm-offset-2 Tracker123text-right'>
						<input type='submit' class="btn" value="Continue"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop