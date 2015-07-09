<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Log in to your Rocky Superdog Account</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ route('login') }}" class="form-signin">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h2 class="form-signin-heading">Please log in</h2>
					<input type="email" id="inputEmail" name="email_address" class="form-control" placeholder="Email address" required autofocus>
					<br clear="all">
					<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember_me" value="remember-me"> Remember me
						</label>
					</div>
					<button class="login btn btn-lg btn-block">Log In</button>
                    <p class="text-warning text-center loader" style="margin-top:10px"></p>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- SIGN IN -->
<div class="modal fade" id="sigunpModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="signupModalLabel">Create your rocky account now!</h4>
    	</div>
    	<div class="row modal-body">
    		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 reg">
    			<h2>Not a member yet?</h2>
    			<h3>Register for free</h3>

    			<div role="tabpanel">
    				<!-- Nav tabs -->
    				<ul class="nav nav-tabs" role="tablist">
    					<li role="presentation" class="active"><a href="#mem" class="tabclick" aria-controls="mem" role="tab" data-toggle="tab">Member</a></li>
    					<li role="presentation"><a href="#merch" class="tabclick" aria-controls="merch" role="tab" data-toggle="tab">Merchant</a></li>
    					<li role="presentation"><a href="#foundation" class="tabclick" aria-controls="foundation" role="tab" data-toggle="tab">Pet Foundation</a></li>
    					<li role="presentation"><a href="#vet" class="tabclick" aria-controls="vet" role="tab" data-toggle="tab">Veterinarian</a></li>
    				</ul>

    				<!-- Tab panes -->
    					<!-- Petshops -->
    					<div role="tabpanel" class="tab-pane" id="merch">
    						<p>Signing up as a <strong>Petshop</strong></p>
    						<form action="{{ route('register') }}" method="POST" class="form-horizontal">
    							<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="user_type" value="2">
    							<label for="email" class="regemaillbl">Email Address</label>
								<input token="{{ csrf_token() }}" type="email" name="email_address" class="form-control regemail1" placeholder="Email Address" required>
    							<div class="divCheckEmail"></div>
    							<br clear="all">
    							<label for="email_conforimation" class="sr-only">Confirm Email</label>
								<input type="email" name="email_address_confirmation" class="form-control" placeholder="Confirm Email Address" required>
    							<br clear="all">
    							<label for="password" class="passwordlbl">Password</label>
								<input type="password" name="password" class="form-control txtNewPasswordtwo" placeholder="Password" required>
    							<div class="divCheckPasswordLen"></div>
    							<br clear="all">
    							<label for="confirm_password" class="confirmpasswordlbl">Confirm Password</label>
								<input class="form-control txtConfirmPasswordtwo" onChange="checkPasswordMatch();" type="password" name="password_confirmation" placeholder="Password" required>
    							<div class="divCheckPasswordMatch" id="registrationFormAlert"></div>
    							<br clear="all">
    							<label for="firstname" class="fnamelbl">First Name</label>
								<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
    							<br clear="all">
    							<label for="lastname" class="lnamelbl">Last Name</label>
								<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
 								<br clear="all">
    							<div class="form-group col-sm-12">
    								<label class="col-sm-4 col-sm-offset-1 control-label">Gender:</label>
    								<div class="radio col-sm-2">
    									<label>
    										<input type="radio" name="gender" value="M" checked>
    										Male
    									</label>
    								</div>
    								<div class="radio col-sm-2">
    									<label>
    										<input type="radio" name="gender" value="F">
    										Female
    									</label>
    								</div>
    							</div>

    							<p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Privacy policy</a>.</p>
    							<div class="form-group text-right">
    								<div class="col-sm-offset-2 col-sm-10">
    									<input type="submit" value="Sign Up" class="btn btn-default">
    								</div>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    	</div>
    </div>
</div>
</div>