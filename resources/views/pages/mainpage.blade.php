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
				<form action="{{ route('register') }}" method="POST" class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="email" name="email_address" id="input-35" required />
						<label class="input__label input__label--kaede" for="input-35">
							<span class="input__label-content input__label-content--kaede">Email Address</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="email" name="email_address_confirmation" id="input-36" required />
						<label class="input__label input__label--kaede" for="input-36">
							<span class="input__label-content input__label-content--kaede">Confirm Email</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="password" name="password" id="input-37" required />
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede">Password</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="password" name="password_confirmation" id="input-38" required />
						<label class="input__label input__label--kaede" for="input-38">
							<span class="input__label-content input__label-content--kaede">Confirm Password</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="first_name" id="input-39" required />
						<label class="input__label input__label--kaede" for="input-39">
							<span class="input__label-content input__label-content--kaede">First Name</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="last_name" id="input-40" required />
						<label class="input__label input__label--kaede" for="input-40">
							<span class="input__label-content input__label-content--kaede">Last Name</span>
						</label>
					</span>
					<div class="form-group col-sm-12">
						<label class="col-sm-5 control-label">Birthdate:</label>
						<div class="col-sm-7">
							<input class=" datepicker form-control" type="date" name="birth_date"  required />
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-4 col-sm-offset-1 control-label">Gender:</label>
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
					<div class="form-group col-sm-12 text-left">
						<label class="col-sm-12 control-label user-type">
							User Type:
							<a href="#" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Tooltip on top"></a>

						</label>
						<div class="radio col-sm-3">
							<label>
								<input type="radio" name="user_type" value="1" checked>
								Member
							</label>
						</div>
						<div class="radio col-sm-3">
							<label>
								<input type="radio" name="user_type" value="2">
								Merchant
							</label>
						</div>
						<div class="radio col-sm-5">
							<label>
								<input type="radio" name="user_type" value="3">
								Pet Foundation
							</label>
						</div>
					</div>
					<p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Privacy policy</a>.</p>
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