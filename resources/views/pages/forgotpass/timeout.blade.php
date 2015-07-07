@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container">
		{!! trans('emailvalidation.forgot.message.timeout', ['route' => route('login.forgot.resend',$id)]) !!}
	</div>
</div>

@stop