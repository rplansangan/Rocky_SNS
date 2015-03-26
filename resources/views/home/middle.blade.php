<style>
	ul.nav.nav-tabs li a {
	  color: #E74C3C;
	}
</style>

<div role="tabpanel" class="  post-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<form method="POST" action="{{ route('files.newsfeed') }}" class="form-horizontal" id="form-post" role="form" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="file" name="file" id="fileuploader" class="form-control">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Post</a></li>
			<li role="presentation"><a href="#" id="OpenImgUpload" aria-controls="profile" role="tab" data-toggle="tab">Upload Image</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<ul class="comment-post">
					<li>
						<div class="form-group">
							<textarea class="form-control" max="500" name="message" id="post_message" placeholder=" Say Something..."></textarea>
						</div>
					</li>
					<li>
						<div class="form-group text-right">
							<div class="row">
								<div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
									<input type="submit" value="post" class="btn btn-color">
								</div>
							</div>
						</div>
					</li>
				</ul>			
			</div>
		</div>
	</form>
</div>

<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend>News feed</legend>
	<ul class="media-list append-post">
		@foreach($newsfeed as $single)
			@include('ajax.post', array('user' => $single->user, 'message' => $single, 'image' => $single->image, 'like' => $single->like, 'comments' => $single->comment))
		@endforeach
	</ul>
</div>

