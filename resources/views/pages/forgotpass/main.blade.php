@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container">
		<form method="POST" action="{{ route('login.forgot.process') }}" class="form-signin col-sm-12 col-xs-12 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<input type="text" name="email" placeholder="E-mail Address">
			<input type="submit" value="Submit">			
		</form>
	</div>
</div>

@stop