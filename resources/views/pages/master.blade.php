@extends('master')
@section('content')
	<div class="container-fluid body">
		<div class="row">
			<div class="col-lg-2 left">
				@include($left)
			</div>
			<div class="col-lg-8 mid col-sm-12 col-xs-12 col-md-12">
				@include($mid)
			</div>
			<div class="col-lg-2 right col-sm-12 col-xs-12 col-md-12">
				@include($right)
			</div>
		</div>
		<br clear="all">
	</div>
@stop