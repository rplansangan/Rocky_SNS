@extends('master')

@section('site_title')
Welcome to Rocky The Superdog
@stop
@section('content')

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Modal title</h4>
    	</div>
    	<div class="modal-body">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 errorlogin">
				<div class="container">
					<p>{{$message}}</p>
					<form method="POST" action="{{ route('login') }}" class="form-signin col-sm-12 col-xs-12 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<h2 class="form-signin-heading">Log In</h2>

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
						<button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
					</form>
				</div>
			</div>
		</div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	    </div>
    </div>
  </div>
</div>

@stop