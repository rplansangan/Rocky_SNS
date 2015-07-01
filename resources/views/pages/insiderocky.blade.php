@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 left">
				@include('landing.superdogmenu')
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 middle">
				@include('landing.lovers')
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 right">
				@include('landing.right')
			</div>
		</div>
	</div>
@stop