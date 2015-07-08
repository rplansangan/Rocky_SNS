<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="loginModalLabel">Log in to your Rocky Superdog Account</h4>
    	</div>
    	<div class="row modal-body">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 loginform">
				<form method="POST" action="{{ route('login') }}" class="form-signin col-sm-12 col-xs-12 col-md-12 col-lg-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h2 class="form-signin-heading">Please log in</h2>

					<!-- <p>The E-mail or Password you entered is incorrect.</p>-->

					<label for="inputEmail" class="sr-only">Email address</label>
					<input type="email" id="inputEmail" name="email_address" class="form-control" placeholder="Email address" value="{{ Request::old('email_address') }}" required autofocus>
					<br clear="all">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
					</div>
					<button class="login btn btn-lg btn-block" type="submit">Log In</button>
				</form>
			</div>
		</div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	    </div>
    </div>
  </div>
</div>