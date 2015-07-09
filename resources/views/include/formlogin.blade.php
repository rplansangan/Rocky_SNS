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
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="loginModalLabel">Create your rocky account now!</h4>
            </div>
            <div class="modal-body">
                <div class="reg">
                    <h2>Not a member yet <br><small>Register for free</small></h2>
                    <div role="tabpanel">

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#mem" class="tabclick" aria-controls="mem" role="tab" data-toggle="tab">Member</a></li>
                            <li role="presentation"><a href="#merch" class="tabclick" aria-controls="merch" role="tab" data-toggle="tab">Merchant</a></li>
                            <li role="presentation"><a href="#foundation" class="tabclick" aria-controls="foundation" role="tab" data-toggle="tab">Pet Foundation</a></li>
                            <li role="presentation"><a href="#vet" class="tabclick" aria-controls="vet" role="tab" data-toggle="tab">Veterinarian</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="mem">
                                <br clear="all">
                                <form action="{{ route('register') }}" method="POST" class="form-horizontal col-lg-12 form-signup ">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user_type" value="1">
                                    <div class="form-group  has-feedback ">
                                      <label>Email Address</label>
                                      <input type="email" name="email_address" id="email_address" class="form-control" route="{{ Route('check.email') }}" placeholder="Email Address" required>
                                      <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Confirm Email</label>
                                      <input type="email" name="email_address_confirmation" id="email_address_confirmation" class="form-control" placeholder="Confirm Email Address" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" id="password" class="form-control"  placeholder="Password" data-toggle="tooltip" data-placement="left" title="Minimum of 8 Characters" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label >First Name</label>
                                      <input type="text" name="first_name"  class="form-control"  placeholder="First Name"  required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Last Name</label>
                                      <input type="text" name="last_name"  class="form-control"  placeholder="Last Name"  required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
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
                                            <input type="submit" value="Sign Up" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-warning text-center loader" style="margin-top:10px">asd</p>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="merch">...</div>

                        </div>
                    </div>

                </div>
            </div>
            <br clear="all">
        </div>
    </div>
</div>
</div>

