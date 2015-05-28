<div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="shopModalLabel" aria-hidden="true">
	<form method="post" id="form-modal">
		<input type="hidden" name="id" id="modal-form-id">
		<input type="hidden" name="type" id="modal-form-type">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="shopModalLabel"></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="type-inquire" class="control-label">Type:</label>
						<p class="form-control-static modal-type-form"></p>
					</div>
					<div class="form-group">
						<label for="message-inquire" class="control-label">Message:</label>
						<textarea class="form-control primary-textarea" id="message-inquire"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
					<input type="submit" class="btn btn-submit" value="Send Message">
				</div>
			</div>
		</div>
	</form>
</div>


<!-- PRIVATE MESSAGE FORM -->
<div class="modal fade" id="sendmsgModal" tabindex="-1" role="dialog" aria-labelledby="sendmsgModalLabel" aria-hidden="true">
	<form method="post" id="form-modal">
		<input type="hidden" name="id" id="modal-form-id">
		<input type="hidden" name="type" id="modal-form-type">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="sendmsgModalLabel">New message</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="message-text" class="control-label">Message:</label>
						<textarea class="form-control primary-textarea" id="message-text"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-file" id="sendmsgfile">Attach File or Photo</button>
					<input type="file" id="filephotouploader" class="hidden">
					<input type="submit" class="btn btn-submit btn-primary" value="Send Message">
				</div>
			</div>
		</div>
	</form>
</div>


<!-- I FOUND A PET WITH TAG NUMBER -->
<div class="modal fade" id="foundwtag" tabindex="-1" role="dialog" aria-labelledby="foundwtagLabel" aria-hidden="true">
	<form method="post" action="{{ Route('pets.found.add') }}"  enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="foundwtagLabel"></h4>
				</div>
				<div class="modal-body loadmodalhere">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-submit btn-primary" value="Send">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
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
					<h4 class="modal-title" id="foundpetLabel"></h4>
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
								<div class="form-group col-sm-12">
									<label class="col-sm-4 control-label">Pet Name:</label>
									<div class="col-sm-8">
										<input type="text" name="pet_name" class="form-control">
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-4 control-label">How to call this pet:</label>
									<div class="col-sm-8">
										<input type="text" name="pet_call_attn" class="form-control">
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
					<input type="submit" class="btn btn-submit btn-primary" value="Send">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Rocky, Find My Pet -->
<div class="modal fade" id="misspet" tabindex="-1" role="dialog" aria-labelledby="misspetLabel" aria-hidden="true">
	<form method="post" id="form-modal">
		<input type="hidden" name="id" id="modal-form-id">
		<input type="hidden" name="type" id="modal-form-type">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="misspetLabel"></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div role="tabpanel">
					      		<!-- Nav tabs -->
					      		<ul class="nav nav-tabs" role="tablist">
					      			<li role="presentation" class="active"><a href="#petslist" aria-controls="petslist" role="tab" data-toggle="tab">Which pet?</a></li>
					      			<li role="presentation"><a href="#notlisted" aria-controls="notlisted" role="tab" data-toggle="tab">Not Listed</a></li>
					      		</ul>
						      	<div class="tab-content">
							      	<div role="tabpanel" class="tab-pane active" id="petslist">
								      	<h3>Which of your pets have you lost?</h3>
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
											@if(isset($pet->profile_pic))	
												<img src="{{ route('files.get.image', array($pet->user_id, $pet->image[0]->image_id)) }}" width="120px">
											@else
												<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="120px">
											@endif
											<p>Pet Name</p>
										</div>
										<div class="moreinfo col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group col-sm-12">
												<label class="col-sm-3 control-label">Lost in:</label>
												<div class="col-sm-8">
													<input type="text" name="pet_foundat" class="form-control" required>
												</div>
											</div>
											<div class="form-group col-sm-12">
												<label class="col-sm-3 control-label">When:</label>
												<div class="col-sm-8">
													<input type="text" name="pet_foundat" class="form-control" required>
												</div>
											</div>
										</div>
							        </div>
							        <div role="tabpanel" class="tab-pane" id="notlisted">
								        <h3>Lost pet not yet registered?</h3>
								        <div class="form-group col-sm-12">
											<label class="col-sm-4 control-label">Pet Tag Number:</label>
											<div class="col-sm-8">
												<input type="text" name="pet_name" class="form-control" required>
											</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="col-sm-4 control-label">Pet Name:</label>
											<div class="col-sm-8">
												<input type="text" name="pet_name" class="form-control">
											</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="col-sm-4 control-label">How to call this pet:</label>
											<div class="col-sm-8">
												<input type="text" name="pet_call_attn" class="form-control">
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
											<label class="col-sm-4 control-label">Lost in:</label>
											<div class="col-sm-8">
												<input type="text" name="pet_foundat" class="form-control" required>
											</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="col-sm-4 control-label">When:</label>
											<div class="col-sm-8">
												<input type="text" name="pet_foundat" class="form-control" required>
											</div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-submit btn-primary" value="Send">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Missing Pets -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">MISSING PET</h4>
      </div>
      <div class="modal-body col-xs-12 col-sm-12 col-m-12 col-lg-12">
      	<div class="largeimg text-center">
	        <img src="{{ URL::asset('assets/images/missing1.jpg') }}" width="550px">
	    </div>
        <div class="col-xs-12 col-sm-12 col-m-5 col-lg-5 petotherinfos">
        	<p>Sibe the Siberian</p>
        	<p>Dog | Siberian Husky</p>
        	<p>January 2, 2015</p>
        	<p>Male</p>
        	<p>48lbs | 23inches</p>
        	<p>Happy go lucky</p>
        	<p>Chop House T-Bone Steak Flavor | Alpo</p>
        	<p>Wet | Twice a day | 8am & 5pm</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-m-7 col-lg-7 marks text-center">
        	<img src="{{ URL::asset('assets/images/sibe-paw.jpg') }}" width="250px">
        	<p>paws</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Found Pets -->
<div class="modal fade" id="foundModal" tabindex="-1" role="dialog" aria-labelledby="foundModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="foundModalLabel">FOUND PET</h4>
      </div>
      <div class="modal-body loadmodalhere row">
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Adopt a pet full details -->
<div class="modal fade" id="adoptapet" tabindex="-1" role="dialog" aria-labelledby="adoptapetLabel" aria-hidden="true">
	<form method="post" id="form-modal">
		<input type="hidden" name="id" id="modal-form-id">
		<input type="hidden" name="type" id="modal-form-type">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Adopt Me!</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div role="tabpanel">
					      		<!-- Nav tabs -->
					      		<ul class="nav nav-tabs" role="tablist">
					      			<li role="presentation" class="active"><a href="#fulldetails" aria-controls="fulldetails" role="tab" data-toggle="tab">Petname Details</a></li>
					      			<li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Petname Images</a></li>
					      		</ul>
						      	<div class="tab-content">
							      	<div role="tabpanel" class="tab-pane active" id="fulldetails">
								      	<h3>About Petname</h3>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<p>Pet Type: </p>
											<p>Breed: </p>
											<p>Gender: </p>
											<p>Weight: </p>
											<p>Height: </p>
										</div>
							        </div>
							        <div role="tabpanel" class="tab-pane" id="gallery">
								        <h3>Photos of Petname</h3>
								        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
											<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="500px">
											<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="500px">
											<img src="{{ URL::asset('assets/images/pet-default.png') }}" width="500px">
								        </div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Adopt a pet modal -->
<div class="modal fade" id="adoptThisPet" tabindex="-1" role="dialog" aria-labelledby="adoptThisPetLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>I want to adopt Petname</h4>
      </div>
      <div class="modal-body col-xs-12 col-sm-12 col-m-12 col-lg-12">
      	<p>The first step in the process of adopting a pet from the Animal Rescue Project is to complete this application.
      		The application provides important information. Working with you, we will be able to determine if the adoption
      		is in the pet's best interest, and the process ensures that you will find a pet well suited to your lifestyle.</p>
      	<p style="font-weight: bold;">Please note: We reserve the right to refuse adoption to anyone. Please be advised that we will not
      		adopt to persons who mislead or fail to provide accurate information on this application.</p>
      	<div class="col-xs-12 col-sm-12 col-m-12 col-lg-12 perinfo">
      		<h4>Personal Information</h4>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">First Name:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Last Name:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Age:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Address:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">City:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Zip Code:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Province/State:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Contact Number:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Email Address:</label>
	      		<div class="col-sm-8">
	      			<input type="email" name="" class="form-control" required>
	      		</div>
	      	</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-submit btn-primary" value="Send">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- add pets for adoption -->
<div class="modal fade" id="addpetsAdopt" tabindex="-1" role="dialog" aria-labelledby="addpetsAdoptPetLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Add pets for adoption</h4>
      </div>
      <div class="modal-body col-xs-12 col-sm-12 col-m-12 col-lg-12">
      	<div class="col-xs-12 col-sm-12 col-m-12 col-lg-12 perinfo">
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Pet Name:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="pet_name" class="form-control" required>
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
	      			<input type="text" name="breed" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Gender:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="gender" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Weight in lb:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="weight" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Height in cm:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="height" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-4 control-label">Background:</label>
	      		<div class="col-sm-8">
	      			<input type="text" name="background" class="form-control" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
	      		<label class="col-sm-6 control-label">Featured Image:</label>
	      		<div class="col-sm-6">
	      			<button type="button" class="btn btn-file" id="foundfile"><i class="fa fa-file-image-o"></i> Upload</button>
	      			<input type="file" id="filephotouploader" class="hidden" required>
	      		</div>
	      	</div>
	      	<div class="form-group col-sm-12">
					<label class="col-sm-2 control-label">Other Images:</label>
					<div class='col-sm-8 other-imgs'>
						<input type='file' name="other_img[]" class="other_img col-sm-6" />
					</div>
				</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-submit btn-primary" value="Add">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>