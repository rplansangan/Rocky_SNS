@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

<style>
.subhead-content {
  display: none;
}
</style>

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content">
	<div class="aboutsum col-sm-12 col-xs-12 col-md-2 col-lg-2">
		@include('landing.superdogmenu')
	</div>
	<div class="land-mid-vid-btn col-sm-12 col-xs-12 col-md-7 col-lg-7 text-center">
		<div class="wording">
			<h2>Join Rocky Superdog for FREE</h2>
			<h4>and showoff your lovely pets with other pet lovers!</h4>
		</div>
		<div class="land-btn col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center">
			<a class="redi-btn" href="{{ route('signup') }}" style="visibility: hidden;">
				Sign Up or Log In here!
			</a>
		</div>
		<div class="land-vid col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<iframe width="100%" height="385" src="https://www.youtube.com/embed/V4BFzpAcYc4" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>


	<!-- FOUND PET MID CONTENT -->
	<div class="land-found col-sm-12 col-xs-12 col-md-6 col-lg-6">
		<div class="foundpets-page col-sm-12 col-xs-12 col-lg-12 col-md-12">
			<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
				<div class="col-xs-12 col-sm-12 col-m-7 col-lg-7">
					<legend><h2>FOUND PETS</h2></legend>
				</div>
				<div class="col-xs-12 col-sm-12 col-m-5 col-lg-5">
					<a class="redi-btn" href="{{ route('signup') }}">
						Sign Up or Log In Here!
					</a>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found1.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found2.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found3.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found4.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found5.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end of found pets -->


	<!-- MISSING PET MID CONTENT -->
	<div class="land-missing col-sm-12 col-xs-12 col-md-7 col-lg-7">
		<div class="foundpets-page col-sm-12 col-xs-12 col-lg-12 col-md-12">
			<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
				<div class="col-xs-12 col-sm-12 col-m-7 col-lg-7">
					<legend><h2>MISSING PETS</h2></legend>
				</div>
				<div class="col-xs-12 col-sm-12 col-m-5 col-lg-5">
					<a class="redi-btn" href="{{ route('signup') }}">
						Sign Up or Log In Here!
					</a>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing1.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing2.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing3.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing4.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel found-imgs-mainp">
				<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 found-imgs">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing5.jpg') }}" width="350px" height="235px">
				</div>

				<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000</a></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
					<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end of missing pet content -->

	<div class="funny-videos col-sm-12 col-xs-12 col-md-3 col-lg-3 text-center" style="padding:0px">
		<h3>FUNNY VIDEOS</h3>
		<div class="funny-human col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<iframe width="310" height="225" src="https://www.youtube.com/embed/N9oxmRT2YWw" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="funny-dog col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<iframe width="310" height="225" src="https://www.youtube.com/embed/SpkSejI8OQE" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="rockygif col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<img src="{{ URL::asset('assets/images/rocky-superdog.gif') }}">
		</div>
	</div>
</div>

@stop