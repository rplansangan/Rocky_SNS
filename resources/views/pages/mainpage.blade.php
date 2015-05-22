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

				<div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#mem" aria-controls="mem" role="tab" data-toggle="tab">Member</a></li>
				    <li role="presentation"><a href="#merch" aria-controls="merch" role="tab" data-toggle="tab">Merchant</a></li>
				    <li role="presentation"><a href="#foundation" aria-controls="foundation" role="tab" data-toggle="tab">Pet Foundation</a></li>
				    <li role="presentation"><a href="#vet" aria-controls="vet" role="tab" data-toggle="tab">Veterinarian</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="mem">
				    	<p>Signing up as a <strong>MEMBER</strong></p>
				    	<form action="{{ route('register') }}" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="user_type" value="1">
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
							<p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Privacy policy</a>.</p>
							<div class="form-group text-right">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" value="Sign Up" class="btn btn-default">
								</div>
							</div>
						</form>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="merch">
				    	<p>Signing up as a <strong>MERCHANT</strong></p>
				    	<form action="{{ route('register') }}" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="user_type" value="2">
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address" id="input-55" required />
								<label class="input__label input__label--kaede" for="input-55">
									<span class="input__label-content input__label-content--kaede">Email Address</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address_confirmation" id="input-56" required />
								<label class="input__label input__label--kaede" for="input-56">
									<span class="input__label-content input__label-content--kaede">Confirm Email</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password" id="input-57" required />
								<label class="input__label input__label--kaede" for="input-57">
									<span class="input__label-content input__label-content--kaede">Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password_confirmation" id="input-58" required />
								<label class="input__label input__label--kaede" for="input-58">
									<span class="input__label-content input__label-content--kaede">Confirm Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="first_name" id="input-59" required />
								<label class="input__label input__label--kaede" for="input-59">
									<span class="input__label-content input__label-content--kaede">First Name</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="last_name" id="input-60" required />
								<label class="input__label input__label--kaede" for="input-60">
									<span class="input__label-content input__label-content--kaede">Last Name</span>
								</label>
							</span>
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
							<p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Privacy policy</a>.</p>
							<div class="form-group text-right">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" value="Sign Up" class="btn btn-default">
								</div>
							</div>
						</form>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="foundation">
				    	<p>Signing up as a <strong>PET FOUNDATION</strong></p>
				    	<form action="{{ route('register') }}" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="user_type" value="3">
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address" id="input-61" required />
								<label class="input__label input__label--kaede" for="input-61">
									<span class="input__label-content input__label-content--kaede">Email Address</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address_confirmation" id="input-62" required />
								<label class="input__label input__label--kaede" for="input-62">
									<span class="input__label-content input__label-content--kaede">Confirm Email</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password" id="input-63" required />
								<label class="input__label input__label--kaede" for="input-63">
									<span class="input__label-content input__label-content--kaede">Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password_confirmation" id="input-64" required />
								<label class="input__label input__label--kaede" for="input-64">
									<span class="input__label-content input__label-content--kaede">Confirm Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="first_name" id="input-65" required />
								<label class="input__label input__label--kaede" for="input-65">
									<span class="input__label-content input__label-content--kaede">First Name</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="last_name" id="input-66" required />
								<label class="input__label input__label--kaede" for="input-66">
									<span class="input__label-content input__label-content--kaede">Last Name</span>
								</label>
							</span>
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
							<p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Privacy policy</a>.</p>
							<div class="form-group text-right">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" value="Sign Up" class="btn btn-default">
								</div>
							</div>
						</form>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="vet">
				    	<p>Signing up as a <strong>VETERINARIAN</strong></p>
				    	<form action="{{ route('register') }}" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="user_type" value="4">
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address" id="input-72" required />
								<label class="input__label input__label--kaede" for="input-72">
									<span class="input__label-content input__label-content--kaede">Email Address</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="email" name="email_address_confirmation" id="input-67" required />
								<label class="input__label input__label--kaede" for="input-67">
									<span class="input__label-content input__label-content--kaede">Confirm Email</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password" id="input-68" required />
								<label class="input__label input__label--kaede" for="input-68">
									<span class="input__label-content input__label-content--kaede">Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="password" name="password_confirmation" id="input-69" required />
								<label class="input__label input__label--kaede" for="input-69">
									<span class="input__label-content input__label-content--kaede">Confirm Password</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="first_name" id="input-70" required />
								<label class="input__label input__label--kaede" for="input-70">
									<span class="input__label-content input__label-content--kaede">First Name</span>
								</label>
							</span>
							<span class="input input--kaede">
								<input class="input__field input__field--kaede" type="text" name="last_name" id="input-71" required />
								<label class="input__label input__label--kaede" for="input-71">
									<span class="input__label-content input__label-content--kaede">Last Name</span>
								</label>
							</span>
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
		</div>
	</div>
</div>

@stop