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
							<input type="checkbox" name="remember_me"> Remember me
						</label>
					</div>
					<button class="login btn btn-lg btn-block">Log In</button>
                    <p class="text-warning text-center loader" style="margin-top:10px"></p>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- SIGN UP -->
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
                                      <input type="email" name="email_address" class="form-control email_address" route="{{ Route('check.email') }}" placeholder="Email Address" required>
                                      <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Confirm Email</label>
                                      <input type="email" name="email_address_confirmation" class="form-control email_address_confirmation" placeholder="Confirm Email Address" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" class="form-control password"  placeholder="Password" required>
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
                                    <p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#" class="tnp">Terms</a> and that you have read our <a href="#" class="tnp">Privacy policy</a>.</p>
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
                            <div role="tabpanel" class="tab-pane" id="merch">
                                <br clear="all">
                                <form action="{{ route('register') }}" method="POST" class="form-horizontal col-lg-12 form-signup ">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user_type" value="2">
                                    <div class="form-group  has-feedback">
                                      <label >Business Name</label>
                                      <input type="text" name="business_name"  id="business_name" class="form-control"  placeholder="Business Name"  required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback ">
                                      <label>Email Address</label>
                                      <input type="email" name="email_address" class="form-control email_address" route="{{ Route('check.email') }}" placeholder="Email Address" required>
                                      <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Confirm Email</label>
                                      <input type="email" name="email_address_confirmation" class="form-control email_address_confirmation" placeholder="Confirm Email Address" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" class="form-control password"  placeholder="Password" required>
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
                                    <p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#" class="tnp">Terms</a> and that you have read our <a href="#" class="tnp">Privacy policy</a>.</p>
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
                            <div role="tabpanel" class="tab-pane" id="foundation">
                                 <br clear="all">
                                <form action="{{ route('register') }}" method="POST" class="form-horizontal col-lg-12 form-signup ">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user_type" value="3">
                                    <div class="form-group  has-feedback">
                                      <label >Foundation Name</label>
                                      <input type="text" name="foundation_name"  id="foundation_name" class="form-control"  placeholder="Foundation Name"  required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback ">
                                      <label>Email Address</label>
                                      <input type="email" name="email_address" class="form-control email_address" route="{{ Route('check.email') }}" placeholder="Email Address" required>
                                      <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Confirm Email</label>
                                      <input type="email" name="email_address_confirmation" class="form-control email_address_confirmation" placeholder="Confirm Email Address" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" class="form-control password"  placeholder="Password" required>
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
                                    <p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#" class="tnp">Terms</a> and that you have read our <a href="#" class="tnp">Privacy policy</a>.</p>
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
                            <div role="tabpanel" class="tab-pane" id="vet">
                                 <br clear="all">
                                <form action="{{ route('register') }}" method="POST" class="form-horizontal col-lg-12 form-signup ">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user_type" value="4">
                                    <div class="form-group  has-feedback ">
                                      <label>Email Address</label>
                                      <input type="email" name="email_address" class="form-control email_address" route="{{ Route('check.email') }}" placeholder="Email Address" required>
                                      <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label>Confirm Email</label>
                                      <input type="email" name="email_address_confirmation" class="form-control email_address_confirmation" placeholder="Confirm Email Address" required>
                                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  has-feedback">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" class="form-control password"  placeholder="Password" required>
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
                                    <p class="col-sm-12 text-center">By clicking the Sign Up button, you agree to our <a href="#" class="tnp">Terms</a> and that you have read our <a href="#" class="tnp">Privacy policy</a>.</p>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-left">
                    <h2>Add Your Pet <br></h2>
                </div>
            </div>

            <div class="modal-body">
                <div class="register-page">
                    <div class="register-main">
                        <h2 style="margin-top: 0;"><small>Please complete the form to add your pet</small></h2>
                        <div style="margin-top:30px;">
                            <form method="POST" action="{{ route('register.petRegister') }}" class="form-horizontal reg " id="updateform" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Profile Picture</label>
                                    <div class='col-sm-9'>
                                        <input type='file' name="petfile" class="custom-file-input" required />
                                    </div>
                                </div>
                                <div class="form-group hidden view-image-here">
                                    <div class="col-sm-3 col-sm-offset-2"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Pet Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">How to call this pet:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_call_attn" class="form-control" placeholder="Name" required>
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
                                        <select id="sel-ani-type" name="pet_type" class="form-control" required>
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
                                        <input type="text" name="breed" class="form-control" placeholder="Breed" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estimated Birthdate:</label>
                                    <div class='col-sm-8'>
                                        <input type="date" class="form-control" id="pet_bday" name="pet_bday" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender:</label>
                                    <div class="radio col-sm-2">
                                        <label>
                                            <input type="radio" name="pet_gender" value="M" checked>
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
                                    <div class="col-sm-2">
                                        <input type="text" name="weight" class="form-control" placeholder="Weight" required>
                                    </div>
                                    <label class="col-sm-3 control-label">Height in cm:</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="height" class="form-control" placeholder="Height" required>
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
                                        <input type='submit' class="btn btn-color" value="Add Pet"/>
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


<!-- FIND A PET -->
<div class="modal fade" id="missingPet" tabindex="-1" role="dialog" aria-labelledby="missingPetLabel" aria-hidden="true">
    <form method="post" id="form-modal">
        <input type="hidden" name="id" id="modal-form-id">
        <input type="hidden" name="type" id="modal-form-type">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="missingPetLabel">Rocky, Find My Pet</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="foundpettag_details col-sm-12 col-md-6 col-lg-6">
                                <h4>Pet's Details</h4>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Tag Number:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control" required>
                                    </div>
                                </div>
                                <h4>If Pet doesn't have tag number, fill up this form</h4>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Type:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_type" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Breed:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="breed" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Gender:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_gender" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Weight in lb:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="weight" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Height in cm:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="height" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food Style:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="food_style" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food Brand:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="food" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Feeding Interval:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_interval" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Feeding Time:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Behaviour:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Owner:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_owner" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="findertag_details col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Last seen at:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_foundat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">No. of days since lost:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="finder_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-submit tempo btn-primary" value="Report">
                </div>
            </div>
        </div>
    </form>
</div>


<!-- I FOUND A PET -->
<div class="modal fade" id="foundpet" tabindex="-1" role="dialog" aria-labelledby="foundpetLabel" aria-hidden="true">
    <form method="post" id="form-modal">
        <input type="hidden" name="id" id="modal-form-id">
        <input type="hidden" name="type" id="modal-form-type">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="foundpetLabel">I Found a Pet</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="foundpettag_details col-sm-12 col-md-6 col-lg-6">
                                <h4>Pet's Details</h4>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Tag Number:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control" required>
                                    </div>
                                </div>
                                <h4>If Pet doesn't have tag number, fill up this form</h4>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Type:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_type" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Breed:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="breed" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Gender:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_gender" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Weight in lb:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="weight" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Height in cm:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="height" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food Style:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="food_style" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food Brand:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Food:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="food" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Feeding Interval:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_interval" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Feeding Time:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Pet Behaviour:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="feeding_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Owner:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_owner" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="findertag_details col-sm-12 col-md-6 col-lg-6">
                                <h4>Finder's Details</h4>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Found at:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pet_foundat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="finder_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Email Address:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="finder_email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-4 control-label">Contact Number:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="finder_contact" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-sm-6 control-label">Upload Photos of the found pet:</label>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-file" id="foundfile"><i class="fa fa-file-image-o"></i> Upload</button>
                                        <input type="file" id="filephotouploader" class="hidden" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-submit tempo btn-primary" value="Report">
                </div>
            </div>
        </div>
    </form>
</div>


<!-- VIDEO PLAY -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog nopad modal-lg" role="document">
        <div class="modal-content nopad" style="background-color:black">
            <div class="modal-body video-load"></div>
        </div>
    </div>
</div>

<!-- PET OF THE WEEK -->
<div class="modal fade" id="pwoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog nopad modal-lg" role="document">
        <div class="modal-content nopad">
            <img src="{{ URL::asset('assets/img/nom1-large.jpg') }}">
            <a href="#"><h3 style="color: #b7042c;">Tyrion<small> by Zia Milana</small></h3></a>
        </div>
    </div>
</div>
<div class="modal fade" id="pwtwoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog nopad modal-lg" role="document">
        <div class="modal-content nopad">
            <img src="{{ URL::asset('assets/img/nom2-large.jpg') }}">
            <a href="#"><h3 style="color: #b7042c;">Smiley<small> by Mhar Bucad</small></h3></a>
        </div>
    </div>
</div>
<div class="modal fade" id="pwthrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog nopad modal-lg" role="document">
        <div class="modal-content nopad">
            <img src="{{ URL::asset('assets/img/nom3-large.jpg') }}">
            <a href="#"><h3 style="color: #b7042c;">Coffee<small> by Rap Hael</small></h3></a>
        </div>
    </div>
</div>