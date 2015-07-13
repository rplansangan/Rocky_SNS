<div>
	<div class="text-center">
		<img src="{{ URL::asset('assets/img/cart-large.png') }}">
		<h3>Nearest Petshop <br><small class="text-muted">Find your nearest petshop or own a petshop with us</small></h3>
		<div class="col-lg-6 col-lg-offset-3 search-input-petshop">
			<span>
				<a href="#">Kuala Lumpur</a>
				<a href="#">Selangor</a>
				<a href="#">Penang</a>
				<a href="#">More Cities..</a>
			</span>
			<input type="text" class="form-control input-lg " placeholder="Search for...">
			<a href="#"><img src="{{ URL::asset('assets/img/search.png') }}"></a>
		</div>
		<br clear="all">
	</div>
</div>

<!-- NEWSFEED AREA-->
<div class="newsfeed">
	<!-- NEWSFEED CONTENT -->
	<div class="row petshop-content">
		<div class="col-lg-4">
			<img src="{{ URL::asset('assets/images/new/map1.jpg') }}" class="img-responsive">
		</div>
		<div class="col-lg-8">
			<img src="{{ URL::asset('assets/images/new/loc.jpg') }}" class="img-responsive">
			<div>
				<div class="col-lg-7 nopad">
					<p>Lot T-015A, Mid Valley Megamall<br>
						Lingkaran Syed Putra<br>
						58000 Kuala Lumpur<br>
						Malaysia</p>	
				</div>
				<div class="col-lg-5">
					<a href="#"><i class="fa fa-phone"></i> <span>+63915 123 4567</span></a>
					<br>
					<a href="#"><i class="fa fa-envelope"></i> <span>rocky@rocky.com</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- END NEWSFEED CONTENT -->
	<!-- COMMENT SECTION -->
	<div class="row newsfeed-bottom">
		<div>
			<a href="#"><img src="{{ URL::asset('assets/img/like.png') }}"><span class="like">26</span></a>
		</div>
		<div>
			<a href="javascript:void(0);" id="comment-down"><img src="{{ URL::asset('assets/img/comment.png') }}"></a>
		</div>
	</div>
	<!-- END COMMENT SECTION -->
</div>
<div class="comment-area">
	<div class="text-left loading-dots">
		<a href="#"><span>...</span></a>
	</div>
	<div class="comment-container">
		<div class="col-lg-1">
			<a href="#"><img src="{{ URL::asset('assets/img/puggy.png') }}" class="profile-pic"></a>
		</div>
		<div class="col-lg-11">
			<div class="row">
				<div class="col-lg-6 text-left nopad">
					<a href="#"><span>Bull</span></a>
				</div>
				<div class="col-lg-6 text-right nopad">
					<h6><small>26 Minutes ago</small></h6>
				</div>
			</div>
			<div class="row">
				<div class="comment-message">
					<p>I feel good so good</p>
				</div>
			</div>
		</div>
		<br clear="all">
	</div>
	<div class="comment-container">
		<div class="col-lg-1">
			<a href="#"><img src="{{ URL::asset('assets/img/puggy.png') }}" class="profile-pic"></a>
		</div>
		<div class="col-lg-11">
			<div class="row">
				<div class="col-lg-6 text-left nopad">
					<a href="#"><span>Bull</span></a>
				</div>
				<div class="col-lg-6 text-right nopad">
					<h6><small>26 Minutes ago</small></h6>
				</div>
			</div>
			<div class="row">
				<div class="comment-message">
					<p>I feel good so good</p>
				</div>
			</div>
		</div>
		<br clear="all">
	</div>
	<div class="reply-textarea">
		<div class="col-lg-1 nopad">
			<a href="#" class="arrow_right"><img src="{{ URL::asset('assets/img/prof.png') }}" class="img-thumbnail profile-pic"></a>
		</div>
		<div class="col-lg-11 nopad">
			<textarea class="form-control"></textarea>
		</div>
		<br clear="all">
	</div>
</div>