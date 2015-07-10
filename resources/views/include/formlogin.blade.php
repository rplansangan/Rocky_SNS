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


<!-- ADD PETS -->
<div class="modal fade" id="addpetModal" tabindex="-1" role="dialog" aria-labelledby="addpetModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center">
                    <h2>Add Your Pet <br><small>Please complete the form to add your pet</small></h2>
                </div>
            </div>

            <div class="modal-body">
                <div class="register-page">
                    <div class="register-main">
                       

                        <div style="margin-top:30px;">
                            <form method="POST" action="{{ route('register.petRegister', Auth::id()) }}" class="form-horizontal reg " role="form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Profile Picture</label>
                                    <div class='col-sm-9'>
                                        <input type='file' name="petfile" class="custom-file-input" />
                                    </div>
                                </div>
                                <div class="form-group hidden view-image-here">
                                    <div class="col-sm-3 col-sm-offset-2"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Pet Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">How to call this pet:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_call_attn" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Rocky Tag Number:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="rocky_tag_no" class="form-control" placeholder="Rocky Tag Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Animal Type:</label>
                                    <div class='col-sm-8'>
                                        <select id="sel-ani-type" name="pet_type" class="form-control">
                                            <option></option>
                                            <option value="1">Dog</option>
                                            <option value="2">Cat</option>
                                            <option value="3">Pig</option>
                                            <option value="4">Hamster</option>
                                            <option value="5">Rabbit</option>
                                            <option value="6">Guinea Pig</option>
                                            <option value="7">Hedgehog</option>
                                            <option value="8">Bird</option>
                                            <option value="9">Fish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Breed:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="breed" class="form-control" placeholder="Breed">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estimated Birthdate:</label>
                                    <div class='col-sm-8'>
                                        <input type="date" class="form-control" id="pet_bday" name="pet_bday">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender:</label>
                                    <div class="radio col-sm-2">
                                        <label>
                                            <input type="radio" name="pet_gender" value="M">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio col-sm-2">
                                        <label>
                                            <input type="radio" name="pet_gender" value="F">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Weight in lb:</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="weight" class="form-control" placeholder="Weight">
                                    </div>
                                    <label class="col-sm-2 control-label">Height in cm:</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="height" class="form-control" placeholder="Height">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Food:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="food" class="form-control" placeholder="eg: Dog Food">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Food Brand:</label>
                                    <div class="col-sm-8">
                                        <input id="fld-food-brand" type="text" name="brand" class="form-control" placeholder="Food Brand" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Food Style:</label>
                                    <div class='col-sm-8'>
                                        <select name="food_style" class="form-control">
                                            <option></option>
                                            <option>Wet</option>
                                            <option>Dry</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Feeding Interval:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_interval" class="form-control" placeholder="eg: twice a day">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Feeding Time:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_time" class="form-control" placeholder="eg: 8am and 5pm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Behavior</label>
                                    <div class="col-sm-8">
                                        <input id="fld-pet-behavior" type="text" name="behavior" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Likes:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_likes" class="form-control" placeholder="Likes">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dislikes:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_dislikes" class="form-control" placeholder="Dislikes">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Identifying Marks:</label>
                                    <div class='col-sm-8 add-pet-file-div'>
                                        <input type='file' name="identifying_marks[]" class="ident_marks col-sm-6" />
                                        <input type="text" name="identifying_marks_desc[]" class="col-sm-6" placeholder="Identifying Mark Description" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class='col-sm-8 col-sm-offset-3 Tracker123 text-right'>
                                        <input type='submit' class="btn btn-color" value="Add"/>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>