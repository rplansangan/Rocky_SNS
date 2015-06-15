@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 errorlogin">
	<div class="container">
		<p>{{$message}}</p>
		
		<form method="POST" action="{{ route('login') }}" class="form-signin col-sm-12 col-xs-12 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h2 class="form-signin-heading">Log In</h2>
			<!-- <p>The E-mail or Password you entered is incorrect.</p>-->
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" name="email_address" class="form-control" placeholder="Email address" value="{{ Request::old('email_address') }}" required autofocus>
			<br clear="all">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
			<span>or <a href="{{ route('signup') }}">Sign Up Here</a></span>
		</form>
	</div>
</div>

<style>
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
}
</style>

@stop