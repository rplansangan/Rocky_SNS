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


<!-- I FOUND A PET & FIND MY PET FORM -->
<div class="modal fade" id="misfo" tabindex="-1" role="dialog" aria-labelledby="misfoLabel" aria-hidden="true">
	<form method="post" id="form-modal">
		<input type="hidden" name="id" id="modal-form-id">
		<input type="hidden" name="type" id="modal-form-type">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="misfoLabel"></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="type-inquire" class="control-label">Sender:</label>
						<input type="text">
						<p class="form-control-static modal-type-form"></p>
					</div>
					<div class="form-group">
						<label for="message-inquire" class="control-label">Message:</label>
						<textarea class="form-control primary-textarea" id="message-inquire"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-file" id="sendmsgfile">Upload a Photo</button>
					<input type="file" id="filephotouploader" class="hidden">
					<input type="submit" class="btn btn-cancel" data-dismiss="modal" value="Send Message">
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
      <div class="modal-body col-xs-12 col-sm-12 col-m-12 col-lg-12">
      	<div class="largeimg text-center">
	        <img src="{{ URL::asset('assets/images/found1.jpg') }}" width="550px">
	    </div>
        <div class="col-xs-12 col-sm-12 col-m-5 col-lg-5 petotherinfos">
        	<p>Smiley</p>
        	<p>Dog | Golden Retriever</p>
        	<p>January 2, 2015</p>
        	<p>Male</p>
        	<p>48lbs | 23inches</p>
        	<p>Happy go lucky</p>
        	<p>Chop House T-Bone Steak Flavor | Alpo</p>
        	<p>Wet | Twice a day | 8am & 5pm</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-m-7 col-lg-7 marks text-center">
        	<img src="{{ URL::asset('assets/images/ret-paw.jpg') }}" width="250px">
        	<p>paws</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>