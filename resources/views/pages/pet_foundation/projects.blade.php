@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 projtitle-btn">
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<h3>Project title</h3>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 text-right">
			<button class="addproj" type="button">Add more projects</button>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 proj-container">
		<div class="proj-imgs col-sm-12 col-xs-12 col-lg-12 col-md-12">
			<div class="col-sm-12 col-xs-12 col-lg-9 col-md-9" style="padding: 0;">
				<div id="projCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Carousel indicators -->
				    <ol class="carousel-indicators">
				        <li data-target="#projCarousel" data-slide-to="0" class="active"></li>
				        <li data-target="#projCarousel" data-slide-to="1"></li>
				        <li data-target="#projCarousel" data-slide-to="2"></li>
				        <li data-target="#projCarousel" data-slide-to="3"></li>
				    </ol>   
				    <!-- Carousel items -->
				    <div class="carousel-inner">
				        <div class="item active">
				            <img src="{{ URL::asset('assets/images/proj1.jpg') }}" width="820">
				            <div class="carousel-caption">
				              <h3>Photo title</h3>
				              <p>photo short description</p>
				            </div>
				        </div>
				        <div class="item">
				            <img src="{{ URL::asset('assets/images/proj2.jpg') }}" width="820">
				            <div class="carousel-caption">
				              <h3>Photo title</h3>
				              <p>photo short description</p>
				            </div>
				        </div>
				        <div class="item">
				            <img src="{{ URL::asset('assets/images/proj3.jpg') }}" width="820">
				            <div class="carousel-caption">
				              <h3>Photo title</h3>
				              <p>photo short description</p>
				            </div>
				        </div>
				         <div class="item">
				            <img src="{{ URL::asset('assets/images/proj4.jpg') }}" width="820">
				            <div class="carousel-caption">
				              <h3>Photo title</h3>
				              <p>photo short description</p>
				            </div>
				        </div>
				    </div>
			    </div>
			    <!-- Carousel nav -->
			    <a class="carousel-control left" href="#projCarousel" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
			    <a class="carousel-control right" href="#projCarousel" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			    </a>
			</div>
		</div>
	</div>
</div>

@stop