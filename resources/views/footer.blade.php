@if(Request::url() == route('index') || Request::url() == route('signup'))
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
		<div class="footer">
			<div class="container">
				<p>&copy; Rocky The Super Dog 2015</p>
			</div>
		</div>
	</div>
@else
	<div class="footer">
		<div class="container">
			<p>&copy; Rocky The Super Dog 2015</p>
		</div>
	</div>
@endif
</body>
</html>