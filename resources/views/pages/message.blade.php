 @extends('master')
@section('site_title')
Confirm Rocky The Superdog Account
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 msg-content">
	<div class="container">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 msg-text">
			@if($validation_errors)
				<ul>
					@foreach($validation_errors as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
		
			<h1>Final Step...</h1>

			<p>Please check the email we sent you to verify your account.</p>
			<p>Didn't receive the email? <a href="{{ route('register.validateRehash', array($id)) }}">click here</a> to resend.</p>
		</div>
	</div>
</div>

<style>
.footer{
	position: absolute;
	bottom: 0;
}
</style>

@stop