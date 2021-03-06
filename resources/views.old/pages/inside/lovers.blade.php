<div class="container-fluid">
	@include('include.formPost')
	@if(!$newsfeed->isEmpty())
		@foreach($newsfeed as $row)
			<div class="row post-area">
				<div class="userinf col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php 
						if(isset($row->user->prof_pic)){
							?>
								<a href="#"><img style="width:40px" src="<?php echo mediaSrc($row->user->prof_pic->image_path, $row->user->prof_pic->image_name , $row->user->prof_pic->image_ext) ?>"></a>
							<?php
						}else{
							?>
								<a href="#"><img style="width:40px" src="{{ URL::asset('assets/images/default-pic.png') }}"></a>
							<?php
						}
					?>
					<a href="#">{{ $row->user->first_name.' '.$row->user->last_name}}</a>
					<span>
					<?php 
						if(isset($row->image)){
							if(stristr($row->image->image_mime, 'image/')){
								echo 'posted a Image';
							}else{
								echo 'posted a video';
							}
						}
					?>
					</span>
					<span class="date" ><?php echo _ago(strtotime($row->created_at)) ?> ago</span><br>
				</div>
				<div class="postcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p><?php echo $row->post->post_message ?></p>
					<?php 
						if(isset($row->image)){
							if(stristr($row->image->image_mime, 'image/')){
								?>
									<a href="#"><img class="vidphoto img-responsive img-thumbnail" src="<?php echo mediaSrc($row->image->image_path, $row->image->image_name , $row->image->image_ext) ?>"></a>
								<?php
							}else{
								?>
									<img class="vidphoto img-responsive img-thumbnail" src="<?php echo mediaSrc($row->image->image_path, $row->image->image_name.'_thumb' , 'jpg' ) ?>">
									<div id="play-button"><a href="#"><img src="{{ URL::asset('assets/images/landing/play.png') }}" > </a></div>
								<?php
							}
						}
					?>
					<div class="like-comm">
						<a href="#"><img src="{{ URL::asset('assets/images/new/rheart.png') }}"><span style="color:white">28</span></a>
						<a href="#"><img src="{{ URL::asset('assets/images/new/comment-icon.png') }}"></a>
					</div>
					<?php 
						if(Auth::check()){
							?>
								<div class='row'>
									<div class="col-lg-1 nopad img-arrow">
										<?php 
											if(isset($profile->prof_pic)){
												?>
													<img class="img-responsive img-thumbnail" src="<?php echo mediaSrc($profile->prof_pic->image_path, $profile->prof_pic->image_name , $profile->prof_pic->image_ext) ?>"><span class="arrow-right"></span></img>
												<?php
											}else{
												?>
													<img class="img-responsive img-thumbnail" src="#"><span class="arrow-right"></span></img>
												<?php
											}
										?>
									</div>
									<div class="comminput col-lg-11" style="padding-right:0;">
										<div class="row">
											<textarea class="form-control" rows="3" placeholder="Comment..."></textarea>
										</div>
									</div>
								</div>	
							<?php
						}
					?>
				</div>
			</div>
		@endforeach
	@else
		<p>No Post</p>
	@endif
</div>