@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop


@section('content')
<style>
.subhead-content {
  display: none;
}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		var sliderBx;
		window.onedir = 'next';
		
		sliderBx = $('#slider1').bxSlider({
			auto: true,
			autoControls: true,
			autoControlsSelector: '#my-start-stop',
			slideWidth: 1160,
			speed: 700,
			autoStart: false
		});

		$('.bx-next').click(function() {
			window.onedir = 'next';
			sliderBx.startShow();						
		});
		
		$('.bx-prev').click(function() {
			window.onedir = 'prev';
			sliderBx.startShow();			
		});
	});
</script>

<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content">
	<div class="land-slider col-xs-12 col-sm-12 col-m-12 col-lg-12" id="container">
		<div id="sliderdiv1">
	        <div id="sliderdiv2">
	            <div id="slider1">
	                <div>
	                	<img src="{{ URL::asset('assets/images/new/slider1.jpg') }}" alt="b01" width="1260px" height="740px" />
	                	<div class="item">
	                		<p>WHO WOULD YOU TURN TO</p>
	                		<h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
	                		<a href="#" class="learn" target="_parent">LEARN MORE</a>
	                		<a href="#" class="join" target="_parent">JOIN NOW</a>
	                	</div>
	                </div>
					<div>
						<img src="{{ URL::asset('assets/images/new/slider2.jpg') }}" alt="b02" width="1260px" height="740px" />
						<div class="item">
	                		<p>WHO WOULD YOU TURN TO</p>
	                		<h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
	                		<a href="#" class="learn" target="_parent">LEARN MORE</a>
	                		<a href="#" class="join" target="_parent">JOIN NOW</a>
	                	</div>
					</div>
					<div>
						<img src="{{ URL::asset('assets/images/new/slider3.jpg') }}" alt="b03" width="1260px" height="740px" />
						<div class="item">
	                		<p>WHO WOULD YOU TURN TO</p>
	                		<h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
	                		<a href="#" class="learn" target="_parent">LEARN MORE</a>
	                		<a href="#" class="join" target="_parent">JOIN NOW</a>
	                	</div>
					</div>
	            </div>
	        </div>
	    </div>
    </div>
	<div class="why-join col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
      <div class="container">
        <h1>WHY JOIN ROCKY SUPERDOG</h1>
        <p>Join us so you can be contacted when matching lost and found dogs <br/>
          are added to our database. Rocky Superdog is fueled by a team of <br/> 
          passionate pet lovers - we provide the best for your furry friend</p>
      </div>
    </div>
    <div class="photo-menu col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
    	<div class="first-row find col-xs-12 col-sm-12 col-m-6 col-lg-6">
    		<h3>FIND</h3>
    		<h1>MISSING PETS</h1>
    		<a href="#">ENTER</a>
    	</div>
    	<div class="first-row community col-xs-12 col-sm-12 col-m-6 col-lg-6">
    		<h3>COMMUNITY OF</h3>
    		<h1>PET LOVERS</h1>
    		<a href="#">ENTER</a>
    	</div>
    	<div class="sec-row all col-xs-12 col-sm-12 col-m-6 col-lg-6">
    		<h3>ALL</h3>
    		<h1>YOUR PET NEEDS</h1>
    		<a href="#">ENTER</a>
    	</div>
    	<div class="first-row watch col-xs-12 col-sm-12 col-m-6 col-lg-6">
    		<h3>WATCH</h3>
    		<h1>FUNNY VIDEOS</h1>
    		<a href="#">ENTER</a>
    	</div>
	</div>
	<div class="land-missing-pets col-xs-12 col-sm-6 col-m-12 col-lg-12 text-center">
		<h1 class="missing-intro">IF YOU FOUND ME, <br/>
			YOU MUST REPORT ME</h1>
		<div class="container">
			<div class="missing-cont col-xs-12 col-sm-6 col-m-3 col-lg-3 text-center">
				<div class="missing-infos">
					<img src="{{ URL::asset('assets/images/new/dolly.jpg') }}">
					<h2>DOLLY</h2>
					<p></p>
					<h3>MISSING <br/> 02 DAYS</h3>
					<a href="#">VIEW</a>
				</div>
			</div>
			<div class="missing-cont col-xs-12 col-sm-6 col-m-3 col-lg-3 text-center">
				<div class="missing-infos">
					<img src="{{ URL::asset('assets/images/new/john.jpg') }}">
					<h2>JOHN</h2>
					<p></p>
					<h3>MISSING <br/> 02 DAYS</h3>
					<a href="#">VIEW</a>
				</div>
			</div>
			<div class="missing-cont col-xs-12 col-sm-6 col-m-3 col-lg-3 text-center">
				<div class="missing-infos">
					<img src="{{ URL::asset('assets/images/new/hello.jpg') }}">
					<h2>HELLO</h2>
					<p></p>
					<h3>MISSING <br/> 02 DAYS</h3>
					<a href="#">VIEW</a>
				</div>
			</div>
			<div class="missing-cont col-xs-12 col-sm-6 col-m-3 col-lg-3 text-center">
				<div class="missing-infos">
					<img src="{{ URL::asset('assets/images/new/scooby.jpg') }}">
					<h2>SCOOBY</h2>
					<p></p>
					<h3>MISSING <br/> 02 DAYS</h3>
					<a href="#">VIEW</a>
				</div>
			</div>
			<h1 class="missing-bottom">10 MILLION PETS GET LOST EVERY YEAR<h1>
		</div>
	</div>
	<div class="land-map col-xs-12 col-sm-12 col-m-12 col-lg-12">
		<div class="container">
			<div class="map-phone col-xs-12 col-sm-12 col-m-7 col-lg-7 text-center">
				<img src="{{ URL::asset('assets/images/new/phone.png') }}">
			</div>
			<div class="map-details col-xs-12 col-sm-12 col-m-5 col-lg-5 text-justify">
				<h1>GPS Pet Tracker</h1>
				<h4>Track your dog’s location using GPS and receive mobile alerts to find your pet if they ever get lost.
					Activity monitoring provides a window into their well-being and so you know your dog is healthy and safe.</h4>
				<div class="track-btn text-right">
					<a class="learn" href="#">LEARN MORE</a>
					<a class="buy" href="#">BUY NOW</a>
				</div>
			</div>
		</div>
	</div>
	<div class="we-care col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
		<div class="wc-cont col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
			<h1>WE CARE ABOUT YOUR PET</h1>
			<h4>Protect them by being part of this community</h4>
			<a href="#">SIGN UP</a>
		</div>
	</div>
	<div class="social col-xs-12 col-sm-12 col-m-12 col-lg-12">
		<div class="social-left col-xs-12 col-sm-12 col-m-6 col-lg-6 text-left">
			<p>Stay connected</p>
			<img src="{{ URL::asset('assets/images/new/social.png') }}" alt="Social" usemap="#Mapsocial" />
			<map name="Mapsocial" id="Mapsocial">
			    <area alt="Facebook" title="Like us on Facebook" target="_blank" href="https://www.facebook.com" shape="circle" coords="13,15"/>
			    <area alt="Pinterest" title="Follow us on Pinterest"  target="_blank" href="https://pinterest.com" shape="circle" coords="45,13"/>
			    <area alt="Twitter" title="Follow us on Twitter"  target="_blank" href="https://twitter.com" shape="circle" coords="74,15"/>
			    <area alt="Youtube" title="Subscribe on our Youtube"  target="_blank" href="https://www.youtube.com" shape="circle" coords="107,17"/>
			    <area alt="Google Plus" title="Add us on Google Plus"  target="_blank" href="https://plus.google.com" shape="circle" coords="139,14"/>
			</map>
		</div>
		<div class="social-right col-xs-12 col-sm-12 col-m-6 col-lg-6 text-center">
			<p style="padding-left: 12%;">Get email updates</p>
			<div class="text-right">
				<a href="#"><img src="{{ URL::asset('assets/images/new/subscribe.png') }}"></a>
			</div>
		</div>
	</div>
</div>

@stop