@extends('master')
@section('site_title')
Confirm Rocky The Superdog Account
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 msg-content">
	<div class="container">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 msg-text">
			@if(isset($validation_errors))
				<ul>
					@foreach($validation_errors as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			
			{!! trans('emailvalidation.validation.message', ['route' => route('register.validateRehash', [$id])]) !!}
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