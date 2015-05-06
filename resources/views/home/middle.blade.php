<style>
ul.nav.nav-tabs li a {
	color: #E74C3C;
}
</style>
<div role="tabpanel" class="post-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<input type="hidden" id="route-newsfeed-refresh" value="{{ route('newsfeed.refresh') }}" _token="{{ csrf_token() }}">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Post</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<form method="POST" action="{{ route('files.newsfeed') }}" class="form-horizontal" id="form-post" role="form" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="file" name="file" id="fileuploader" class="form-control custom-file-input" accept="image/*">
				<input type="file" name="file" id="fileuploaderVideo" class="form-control hidden" accept="video/*">
				<ul class="comment-post">
					<li>
						<div class="form-group">
							<textarea class="form-control primary-textarea" max="500" name="message" placeholder=" Say Something..."></textarea>
						</div>
					</li>
					<li>
						<div class="form-group">
							<input type="hidden" name="image_title" id="video-title" class="form-control" placeholder="Title">
						</div>
					</li>
					<li>
						<div class="form-group text-right">
							<div class="row">
								<div class="col-sm-4 col-lg-4 col-xs-4 col-md-4">
									<select  name="category" class="form-control">
										<option>Funny</option>
										<option>Exhibition</option>
										<option>Play</option>
									</select>
								</div>
								<div class="col-sm-8 col-lg-8 col-xs-8 col-md-8">
									<a class="btn btn-color" id="OpenVideoUpload" class="image-file-input">Upload Video</a>
									<a class="btn btn-color" id="OpenImgUpload"   class="video-file-input">Upload Photo</a>
									<input type="submit" value="post" id="post_btn" class="btn btn-color">
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="form-group">
							<div class="progress-bar bar percent" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%
						</div>
					</li>
				</ul>	
			</form>		
		</div>
	</div>
</div>
<input type="hidden" id="check-refresh-route" value="{{ Route('post.check') }}">
<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<div class="newsfeed-title col-sm-12 col-xs-12 col-lg-12 col-md-12">
		<span class="col-sm-12 col-xs-12 col-lg-6 col-md-6"><legend>News feed</legend></span>
		<span class="text-right col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<a href="javascript:void(0);" id="refresh-btn" class="hidden" value="{{ Route('get.newfeeds') }}" ><img style="width:30px" src="{{ URL::asset('assets/images/Refresh2.png') }}"></a>
		</span>
	</div>
	@include('iterators.posts', array('newsfeed' => $newsfeed))
</div>

