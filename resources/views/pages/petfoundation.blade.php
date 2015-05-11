@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
				@if(Auth::user()->is_foundation === 1)
					@include('forms.form_pet_foundation' , array("action" => route("register_petfoundation")))
				@elseif(Auth::user()->is_member === 1 || Auth::user()->is_member === 1)
					@include('home.petfoundationmid')
				@endif
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop