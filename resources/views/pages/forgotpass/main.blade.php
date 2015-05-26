@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="forgetpass col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container">
		<h4>Password Reset</h4>
		<div class="fp-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<form method="POST" action="{{ route('login.forgot.process') }}" class="form-signin col-sm-12 col-xs-12 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<h3>Find Your Rocky Superdog Account</h3>
				<label>Enter your E-mail Address</label><br/>
				<input type="text" name="email" placeholder="E-mail Address">
				<input type="submit" value="Search">	
			</form>
		</div>
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