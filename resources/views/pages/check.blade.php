@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle usertype-content">
				<div class="col-sm-12 user-type">
					<div class="page-header">
						<h2>User Type</h2>
					</div>
					<div class="col-sm-12 usertype_btn">
						<a href="{{ route('addadvertise') }}" class=" col-sm-5 btn btn_indiv">Individual</a>
						<a href="{{ route('activate_merchant') }}" class=" col-sm-5 col-sm-offset-1 btn btn_merch">Merchant</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop