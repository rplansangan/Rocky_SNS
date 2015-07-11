<?php 
	if(Auth::check()){
		?>
			<div class="row post-area">
				<div class="col-lg-1 nopad img-arrow">
					@if(isset($profile->prof_pic))
						<img class="img-responsive img-thumbnail" src="{{ mediaSrc($profile->prof_pic->image_path , $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}"><span class="arrow-right"></span></img>
					@else
						<img class="img-responsive img-thumbnail" src="{{ URL::asset('assets/images/new/prof-icon.png') }}"><span class="arrow-right"></span></img>
					@endif
					
				</div>
				<div class="col-lg-11">
					<form>
						<input type="file" id="fileMedia" class="hidden" name="media[]" accept="video/* , image/*" multiple>
						<div class="row">
							<textarea class="form-control" rows="3" placeholder="Share your thoughts"></textarea>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="push-left">
								<a href="javascript:void(0);" id="addMediaBtn" ><img src="{{ URL::asset('assets/images/new/addphotos.png') }}"> <span>Add photos/video</span> </a>
								<a href="javascript:void(0);" id="tagNeighborBtn" ><img src="{{ URL::asset('assets/images/new/tagfriends.png') }}"> <span>Tag friends in your post</span> </a>
							</div>
							<div class="push-right">
								<a href="#" class="btn new-btn">Post</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php
	}
?>