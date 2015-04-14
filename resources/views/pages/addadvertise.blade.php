@extends('master')
@section('content')
<div class="container-fluid bg-rocky">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
			@include('home.left')
		</div>
		<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
			<div class="page-header">
				<h2>Add Advertisement</h2>
			</div>
			@include('forms.add_advertise' , array("action" => route("test2")))
			
		</div>
		<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
			@include('home.right')
		</div>
	</div>
</div>



@stop