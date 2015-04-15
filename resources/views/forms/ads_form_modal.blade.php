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