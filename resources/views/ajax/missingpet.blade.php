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
					<form class="lostpet" method="post" action="{{ route('pets.lost.add') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="with-tag" value="true">
						<h3>Which of your pets have you lost?</h3>
						<div class="row">
							@foreach($pets as $row)
								<div class="col-sm-2">
									<img class="img-responsive" src="{{ route('files.get.image', array($row->image[0]->user_id, $row->image[0]->image_id)) }}">
									<input type="radio" name="select-pet" value="{{ $row->pet_id }}"> Select
								</div>
							@endforeach
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="form-group">
								<label class="col-sm-2 control-label">Lost in:</label>
								<div class="col-sm-10">
									<input type="text" name="pet_foundat" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">When:</label>
								<div class="col-sm-10">
									<input type="text" name="pet_when" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="notlisted">
					<h3>Lost pet not yet registered?</h3>
					<form class="lostpet" method="post" action="{{ route('pets.lost.add') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="with-tag" value="false">
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
								<input type="text" name="bahavior" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label class="col-sm-4 control-label">Lost in:</label>
							<div class="col-sm-8">
								<input type="text" name="pet_foundat" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-4 control-label">When:</label>
								<div class="col-sm-8">
									<input type="text" name="pet_when" class="form-control" required>
								</div>
							</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>