@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 petfounda-cont">
		<div class="petfounda-cont col-sm-12 col-xs-12 col-lg-7 col-md-7">
			<h2>{{ $profile->foundation->petfoundation_name }}</h2>
			<p class="pfoundationaddress">Address 
				{{ $profile->foundation->address_line1 }} {{ $profile->foundation->address_line2 }} <br/> 
				{{ $profile->foundation->city }}, {{ $profile->foundation->state }}, {{ $profile->foundation->country }}. {{ $profile->foundation->zip }}
			</p>
			<p class="pfoundationbg">{{ $profile->foundation->petfoundation_background }}</p>
			<p>Contact No.<a href="tel:{{ $profile->foundation->phone_country_code }} {{ $profile->foundation->phone_area_code }} {{ $profile->foundation->phone_number }}"> {{ $profile->foundation->phone_country_code }} {{ $profile->foundation->phone_area_code }} {{ $profile->foundation->phone_number }}</a><br/>
			E-mail Address<a href="mailto:{{ $profile->foundation->email_address}}"> {{ $profile->foundation->email_address}}</a></p>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 petfo-btns">
			<button class="btn btnpf" type="button">Make a Donation</button>
			<a href="{{ route('foundation.adoption') }}" class="adoptbtn">Adopt a Pet</a>
			<button class="btn btnpf" type="button">Volunteer</button>
		</div>
	</div>

	<div class="ft-pets col-xs-12 col-sm-12 col-m-12 col-lg-12">
		<div class="ftp-cont col-xs-12 col-sm-12 col-m-7 col-lg-7">
			<h3>Featured Pets</h3>
			<div id="ftpetsCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Carousel indicators -->
			    <ol class="carousel-indicators">
			        <li data-target="#ftpetsCarousel" data-slide-to="0" class="active"></li>
			        <li data-target="#ftpetsCarousel" data-slide-to="1"></li>
			        <li data-target="#ftpetsCarousel" data-slide-to="2"></li>
			    </ol>   
			    <!-- Carousel items -->
			    <div class="carousel-inner">
			        <div class="item active">
			            <img src="{{ URL::asset('assets/images/ftp1.jpg') }}">
			            <div class="carousel-caption">
			              <h3>Dog pet name</h3>
			              <p>Lorem ipsum dolor sit amet consectetur</p>
			            </div>
			        </div>
			        <div class="item">
			            <img src="{{ URL::asset('assets/images/ftp2.jpg') }}">
			            <div class="carousel-caption">
			              <h3>Cat pet name</h3>
			              <p>Aliquam sit amet gravida nibh, facilisis gravid.</p>
			            </div>
			        </div>
			        <div class="item">
			            <img src="{{ URL::asset('assets/images/ftp3.jpg') }}">
			            <div class="carousel-caption">
			              <h3>Pig pet name</h3>
			              <p>Praesent commodo cursus magna vel.</p>
			            </div>
			        </div>
			    </div>
			    <!-- Carousel nav -->
			    <a class="carousel-control left" href="#ftpetsCarousel" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
			    <a class="carousel-control right" href="#ftpetsCarousel" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			    </a>
			</div>
		</div>
		<div class="our-mission col-xs-12 col-sm-12 col-m-5 col-lg-5 text-justify">
			<h3>Our Goal</h3>
			<p>{{ $profile->foundation->goal_statement }}</p>
		</div>
	</div>

	<div class="mission-vision col-xs-12 col-sm-12 col-m-12 col-lg-12 text-justify">
		<div class="our-mission col-xs-12 col-sm-12 col-m-6 col-lg-6">
			<h3>Our Mission</h3>
			<p>{{ $profile->foundation->mission_statement }}</p>
		</div>
		<div class="our-vision col-xs-12 col-sm-12 col-m-6 col-lg-6">
			<h3>Our Vision</h3>
			<p>{{ $profile->foundation->vision_statement }}</p>
		</div>
	</div>

	<div class="our-proj col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
		<div class="col-xs-12 text-left">
			<h3>Our Projects</h3>
		</div>
		<div class="op col-xs-12 col-sm-12 col-m-4 col-lg-4">
			<img src="{{ URL::asset('assets/images/proj1.jpg') }}" width="250px">
			<h4>Project one</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>
		<div class="op col-xs-12 col-sm-12 col-m-4 col-lg-4">
			<img src="{{ URL::asset('assets/images/proj2.jpg') }}" width="250px">
			<h4>Project two</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>
		<div class="op col-xs-12 col-sm-12 col-m-4 col-lg-4">
			<img src="{{ URL::asset('assets/images/proj3.jpg') }}" width="250px">
			<h4>Project three</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>
		<div class="op col-xs-12 col-sm-12 col-m-4 col-lg-4">
			<img src="{{ URL::asset('assets/images/proj4.jpg') }}" width="250px">
			<h4>Project four</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>
	</div>
</div>
@stop
