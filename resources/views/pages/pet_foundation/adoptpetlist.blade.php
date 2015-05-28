@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adtitle-btn">
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<h3>Pets available for adoption <i class="fa fa-heart"></i></h3>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 text-right">
			<button class="addadoptpet" type="button">Add pet for adoption</button>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adoptpets">
		<div class="adp-cont col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<div class="apetimg col-sm-12 col-xs-12 col-lg-5 col-md-5">
				<img class="adpetdet" src="{{ URL::asset('assets/images/ftp1.jpg') }}" width="200px">
			</div>
			<div class="apetdetails col-sm-12 col-xs-12 col-lg-7 col-md-7">
				<h4 class="adpetdet">Pet name</h4>
				<p>Background say something about this pet. say something about this pet</p>
				<button class="adoptthis" type="button">Adopt this pet</button>
			</div>
		</div>

		<div class="adp-cont col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<div class="apetimg col-sm-12 col-xs-12 col-lg-5 col-md-5">
				<img src="{{ URL::asset('assets/images/ftp1.jpg') }}" width="200px">
			</div>
			<div class="apetdetails col-sm-12 col-xs-12 col-lg-7 col-md-7">
				<h4>Pet name</h4>
				<p>say something about this pet say something about this pet. say something about this pet</p>
			</div>
		</div>

		<div class="adp-cont col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<div class="apetimg col-sm-12 col-xs-12 col-lg-5 col-md-5">
				<img src="{{ URL::asset('assets/images/ftp1.jpg') }}" width="200px">
			</div>
			<div class="apetdetails col-sm-12 col-xs-12 col-lg-7 col-md-7">
				<h4>Pet name</h4>
				<p>say something about this pet say something about this pet. say something about this pet</p>
			</div>
		</div>

		<div class="adp-cont col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<div class="apetimg col-sm-12 col-xs-12 col-lg-5 col-md-5">
				<img src="{{ URL::asset('assets/images/ftp1.jpg') }}" width="200px">
			</div>
			<div class="apetdetails col-sm-12 col-xs-12 col-lg-7 col-md-7">
				<h4>Pet name</h4>
				<p>say something about this pet say something about this pet. say something about this pet</p>
			</div>
		</div>
	</div>
</div>

<style>
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
}
</style>

@stop
