@if(Request::url() == route('login.attempt') || Request::url() == route('login.forgot') || Request::url() == route('foundation.adoption'))
<div class="footer">
	<div class="container">
		<p>&copy; Rocky The Super Dog 2015</p>
	</div>
</div>
@else
<div class="container-fluid nopad" id="landing">
	<!-- FOOTER -->
	<footer class="text-center">
		<div class="footer-subscribe">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Your Email Address">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Subscribe</button>
				</span>
			</div>
		</div>
		<nav class="col-lg-12">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Business Inquiries</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<ul>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Terms of Use</a></li>
				<li><a href="#">Refund Policy</a></li>
			</ul>
		</nav>
		<div class="col-lg-12">
			<p>Copyright <i class="fa fa-copyright"></i> ROCKYSUPERDOG 2015</p>
		</div>
	</footer>
	<!-- END FOOTER -->
</div>
@endif