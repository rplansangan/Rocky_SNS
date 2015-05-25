@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content text-center">
	<div class="aboutsum col-sm-12 col-xs-12 col-md-3 col-lg-3 text-center">
		<div class="headabout">
			<h4>Pet lovers? Pet walkers? Pet shops? Pet Groomers? Pet Foundations? Veterinarians?</h4>
			<h3>You can find them all here!</h3>
		</div>
		<div class="otherabt col-md-12 col-lg-12 text-left">
			<div class="iconsabout col-md-4 col-lg-4">
				<img src="{{ URL::asset('assets/images/what.png') }}">
			</div>
			<div class="iconsabout col-md-8 col-lg-8">
				<p>You can create an account as a member, pet foundation, merchant or even veterinarian.</p>
			</div>
			<div class="iconsabout col-md-4 col-lg-4">
				<img src="{{ URL::asset('assets/images/share.png') }}">
			</div>
			<div class="iconsabout col-md-8 col-lg-8">
				<p>Share news, photos and videos of your pets with other pet lovers.</p>
			</div>
			<div class="iconsabout col-md-4 col-lg-4">
				<img src="{{ URL::asset('assets/images/help.png') }}">
			</div>
			<div class="iconsabout col-md-8 col-lg-8">
				<p>Help pet foundations by adopting or donating and help other pet owners that lost their pets.</p>
			</div>
			<div class="iconsabout col-md-4 col-lg-4">
				<img src="{{ URL::asset('assets/images/conn.png') }}">
			</div>
			<div class="iconsabout col-md-8 col-lg-8">
				<p>Connect with other pet lovers, pet groomers, pet walkers, pet shops, pet foundations and veterinarians near you.</p>
			</div>
		</div>
	</div>
	<div class="land-mid-vid-btn col-sm-12 col-xs-12 col-md-6 col-lg-6">
		<div class="wording">
			<h2>Join Rocky Superdog for FREE</h2>
			<h4>and showoff your lovely pets with other pet lovers!</h4>
		</div>
		<div class="land-btn col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center">
			<a class="redi-btn" href="{{ route('signup') }}">
				Signup Here
			</a>
			&nbsp; now.
		</div>
		<div class="land-vid col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<iframe width="100%" height="385" src="https://www.youtube.com/embed/V4BFzpAcYc4?autoplay=1" frameborder="0" allowfullscreen></iframe>
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
						Signup Here!
					</a>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found1.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found2.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found3.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found4.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found5.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found6.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found7.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found8.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found9.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found1.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found4.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found6.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found3.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found2.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#foundModal" src="{{ URL::asset('assets/images/found7.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>Found at this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="col-xs-12 btninf">
				<p>If you found a pet, kindly click the button below and fillup the form.</p>
				<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>
			</div>
		</div>
	</div>
	<!-- end of found pets -->


	<!-- MISSING PET MID CONTENT -->
	<div class="land-missing col-sm-12 col-xs-12 col-md-6 col-lg-6">
		<div class="foundpets-page col-sm-12 col-xs-12 col-lg-12 col-md-12">
			<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
				<div class="col-xs-12 col-sm-12 col-m-7 col-lg-7">
					<legend><h2>MISSING PETS</h2></legend>
				</div>
				<div class="col-xs-12 col-sm-12 col-m-5 col-lg-5">
					<a class="redi-btn" href="{{ route('signup') }}">
						Signup Here!
					</a>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing1.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing2.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing3.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing4.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing5.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing6.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing7.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing8.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing9.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing2.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing5.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing3.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing9.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing1.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img data-toggle="modal" data-target="#myModal" src="{{ URL::asset('assets/images/missing4.jpg') }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag 12345</p>
						<p><span class="glyphicon glyphicon-eye-close"></span>Lost in this location</p>
						<p><span class="glyphicon glyphicon-user"></span>Owner Corner</p>
					</div>
				</div>
			</div>

			<div class="col-xs-12 btninf">
				<p>If you found a pet, kindly click the button below and fillup the form.</p>
				<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>
			</div>
		</div>
	</div>
	<!-- end of missing pet content -->

	<div class="foud-missing col-sm-12 col-xs-12 col-md-3 col-lg-3">
		<div class="land-right-missing col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<h3><span class="glyphicon glyphicon-hand-right"></span>
				<a class="missingbtn" href="javascript:void(0);">Missing Pets</a>
			<span class="glyphicon glyphicon-hand-left"></span></h3>
			<div class="missing-imgs">
				<img src="{{ URL::asset('assets/images/missing1.jpg') }}" width="250px" height="185px">
			</div>
			<!--<button type="button" class="btn btn_missing" data-toggle="modal" data-target="#misfo" data-type="Missing" data-advertisetype="Find My Pet"  data-title="Missing Pet" data-id="" data-action="" >Find My Pet</button>-->
		</div>

		<div class="land-left-found col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<h3><span class="glyphicon glyphicon-hand-right"></span>
				<a class="foundbtn" href="javascript:void(0);">Found Pets</a>
			<span class="glyphicon glyphicon-hand-left"></span></h3>
			<div class="found-imgs">
				<img src="{{ URL::asset('assets/images/found1.jpg') }}" width="250px" height="185px">
			</div>
			<!--<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>-->
		</div>
	</div>
</div>

@stop