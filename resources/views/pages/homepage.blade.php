@extends('master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12">
				@include('home.middle')
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12">
				@include('home.right')
			</div>
		</div>
	</div>
@stop