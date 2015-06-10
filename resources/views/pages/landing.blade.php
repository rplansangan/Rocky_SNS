@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

<style>
.subhead-content {
  display: none;
}
</style>

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content">
	<div class="aboutsum col-sm-12 col-xs-12 col-md-2 col-lg-2">
		@include($left)
	</div>
	<div class="land-mid-vid-btn col-sm-12 col-xs-12 col-md-7 col-lg-7 text-center">
		@include($mid)
	</div>
	<div class="funny-videos col-sm-12 col-xs-12 col-md-3 col-lg-3 text-left" >
		@include($right)
	</div>
</div>

@stop