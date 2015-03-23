@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container">
		<p>{{$message}}</p>
		<form action="{{ route('login') }}" method="POST" class="form-signin col-sm-12 col-xs-12 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email_address" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			<br clear="all">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
	</div>
</div>

@stop