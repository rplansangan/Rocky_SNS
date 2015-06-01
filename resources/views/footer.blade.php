@if(Request::url() == route('login.attempt') || Request::url() == route('login.forgot') || Request::url() == route('foundation.adoption'))
	<div class="footer">
		<div class="container">
			<p>&copy; Rocky The Super Dog 2015</p>
		</div>
	</div>
@else
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
		<div class="footer">
			<div class="container">
				<div class="col-md-6 col-lg-6 copyright">
					<p>&copy; Rocky The Super Dog 2015</p>
				</div>
				<div class="col-md-6 col-lg-6 pt-links text-right">
			       <a class="about"  href="#">About</a>
			       <a class="privacy"  href="#">Privacy</a>
			       <a class="terms" href="#">Terms</a>
			    </div>
			</div>
		</div>
	</div>
@endif
</body>
</html>