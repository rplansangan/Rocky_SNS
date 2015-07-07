@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 left">
				@include($left)
			</div>
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 middle">
				@include($mid)
			</div>
		</div>
	</div>
@stop