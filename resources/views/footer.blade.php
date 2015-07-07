@if(Request::url() == route('login.attempt') || Request::url() == route('login.forgot') || Request::url() == route('foundation.adoption'))
	<div class="footer">
		<div class="container">
			<p>&copy; Rocky The Super Dog 2015</p>
		</div>
	</div>
@else
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
		<div class="footer">
			<div class="pt-links text-right">
				<a class="careers"  href="#">Careers</a>
				<a class="contactus"  href="#">Contact Us</a>
				<a class="privacy"  href="#">Private Policy</a>
				<a class="terms" href="#">Terms of Use</a>
			</div>
		</div>
	</div>
@endif
</body>
</html>