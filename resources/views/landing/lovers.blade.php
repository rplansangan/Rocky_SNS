<div class="container-fluid">
	@include('include.formPost')

	@foreach($newsfeed as $row)
		{{custom_print_r(_ago(strtotime($row->created_at))) }}
	@endforeach

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/bull.png') }}"></a>
			<a href="#">{{ $row->user->first_name.' '.$row->user->last_name}}</a>
			<span>posted a video</span>
			<span class="date">28 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="vidphoto" src="{{ URL::asset('assets/images/new/vidpug.png') }}"></a>
			<div class="like-comm">
				<a href="#"><img src="{{ URL::asset('assets/images/new/rheart.png') }}"><span>28</span></a>
				<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
			</div>
			<div class="col-lg-1 nopad img-arrow">
				<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
			</div>
			<div class="comminput col-lg-11" style="padding-right:0;">
				<div class="row">
					<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
				</div>
			</div>
		</div>
	</div>

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/twins.png') }}"></a>
			<a href="#">Twins</a>
			<span class="date">29 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p>What Vaccinations Should My Pet Get?</p>
			<div class="like-com-sec col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="like-comm">
					<a href="#"><img src="{{ URL::asset('assets/images/new/wheart.png') }}"><span>12</span></a>
					<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
				</div>
				<div class="col-lg-1 nopad img-arrow">
					<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
				</div>
				<div class="comminput col-lg-11" style="padding-right:0;">
					<div class="row">
						<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/boby.png') }}"></a>
			<a href="#">Bobby</a>
			<span class="date">30 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p>How are you feeling today?</p>
			<div class="like-com-sec col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="like-comm">
					<a href="#"><img src="{{ URL::asset('assets/images/new/wheart.png') }}"><span>15</span></a>
					<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
				</div>
				<div class="col-lg-1 nopad img-arrow">
					<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
				</div>
				<div class="comminput col-lg-11" style="padding-right:0;">
					<div class="row">
						<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/brownie.png') }}"></a>
			<a href="#">Brownie</a>
			<span>posted a video</span>
			<span class="date">32 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="vidphoto" src="{{ URL::asset('assets/images/new/smilevid.png') }}"></a>
			<div class="like-com-sec col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="like-comm">
					<a href="#"><img src="{{ URL::asset('assets/images/new/rheart.png') }}"><span>132</span></a>
					<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
				</div>
				<div class="col-lg-1 nopad img-arrow">
					<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
				</div>
				<div class="comminput col-lg-11" style="padding-right:0;">
					<div class="row">
						<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/husky.png') }}"></a>
			<a href="#">Husky33</a>
			<span class="date">40 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p>I am feeling grumpy today. What makes husky happy?</p>
			<div class="like-com-sec col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="like-comm">
					<a href="#"><img src="{{ URL::asset('assets/images/new/wheart.png') }}"><span>15</span></a>
					<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
				</div>
				<div class="col-lg-1 nopad img-arrow">
					<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
				</div>
				<div class="comminput col-lg-11" style="padding-right:0;">
					<div class="row">
						<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row post-area">
		<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="#"><img class="" src="{{ URL::asset('assets/images/new/rosey.png') }}"></a>
			<a href="#">Rosey</a>
			<span>posted a video</span>
			<span class="date">41 mins ago</span>
		</div>
		<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="vidphoto" src="{{ URL::asset('assets/images/new/dogsvid.png') }}"></a>
			<div class="like-com-sec col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="like-comm">
					<a href="#"><img src="{{ URL::asset('assets/images/new/rheart.png') }}"><span>80</span></a>
					<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
				</div>
				<div class="col-lg-1 nopad img-arrow">
					<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
				</div>
				<div class="comminput col-lg-11" style="padding-right:0;">
					<div class="row">
						<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>