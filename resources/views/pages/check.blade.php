@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
				<div class="col-sm-12">
					<div class="page-header">
						<h2>User Type</h2>
					</div>
					<a href="{{ route('addadvertise') }}" class=" col-sm-5 btn">Individual</a>
					<a href="{{ route('activate_merchant') }}" class=" col-sm-5 col-sm-offset-1 btn">Merchant</a>
				</div>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop