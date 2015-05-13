@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
				<form method="post" action="{{{ route('profile.get.dispatch') }}}">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
					<input type="hidden" name="action" value="pw">
					
					<input type="password" name="password" required>
					<input type="password" name="new_password" required>
					<input type="password" name="new_password_confirmation" required>
					
					<input type="submit">
				</form>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop