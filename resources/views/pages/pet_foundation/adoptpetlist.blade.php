@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adtitle-btn">
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<h3>Pets available for adoption <i class="fa fa-heart"></i></h3>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 text-right">
		@if($adopt_btn == true)
			<button class="addadoptpet" type="button">Add pet for adoption</button>
		@endif
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adoptpets">
		@if(!is_null($list))
			@foreach($list as $single)
				<div class="adp-cont col-sm-12 col-xs-12 col-lg-6 col-md-6">
					<div class="apetimg col-sm-12 col-xs-12 col-lg-5 col-md-5">
						<img class="adpetdet" src="{{ route('foundation.get.image', [$single->prof_pic->user_id, $single->prof_pic->image_id]) }}" width="200px">
					</div>
					<div class="apetdetails col-sm-12 col-xs-12 col-lg-7 col-md-7">
						<h4 class="adpetdet">{{ $single->pet_name }}</h4>
						<p>{{ $single->background }}</p>
						<button class="adoptthis" type="button">Adopt this pet</button>
					</div>
				</div>
			@endforeach
		@else
		
		@endif
	</div>
</div>
@stop
