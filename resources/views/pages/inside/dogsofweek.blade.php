<div class="dow-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="upload-video col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<div class="star col-sm-12 col-xs-12 col-md-1 col-lg-1" style="padding:0;">
			<img src="{{ URL::asset('assets/images/new/dogsweek.png') }}">
		</div>
		<div class="col-sm-12 col-xs-12 col-md-11 col-lg-11" style="padding:0 0 0 15px;">
			<p style="font-size: 18px; margin-bottom: 0px; margin-top: 5px;">Dogs of the week</p>
			<p style="color: #7d7d7d; font-weight: 700; margin-bottom: 0px">Share your funny videos and vote to be the dogs of the week</p>
			<?php 
				if(Auth::check()){
					?>
						<div class="searchvids col-sm-12 col-xs-12 col-md-9 col-lg-9">
				            <form id="tfnewsearch" method="get" action="http://www.google.com">
				                <input type="text" id="tfq" class="tftextinput5" name="q" size="21" maxlength="120"><input type="submit" value=" " class="tfbutton5">
				            </form>
				        </div>
			            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3" style="padding: 0 5px;">
			            	<button class="upvid_btn">Upload a Video</button>
			            </div>
					<?php
				}else{
					?>
						<div class="searchvids col-sm-12 col-xs-12 col-md-9 col-lg-9">
				            <form id="tfnewsearch" method="get" action="http://www.google.com">
				                <input type="text" id="tfq" class="tftextinput5" name="q" size="21" maxlength="120"><input type="submit" value=" " class="tfbutton5">
				            </form>
				        </div>
			            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3" style="padding: 0 5px; margin-top: 20px;">
			            	<a href="#" style="color: #b7062b; padding: 0 15px;">Login to upload videos</a>
			            </div>
					<?php
				}
			?>
		</div>
	</div>

	<div class="videos col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<div class="title col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<div class="title-left col-sm-12 col-xs-12 col-md-6 col-lg-6">
				<img src="{{ URL::asset('assets/images/new/dogsweek.png') }}"> <span>Dogs of the week</span>
			</div>
			<div class="title-right col-sm-12 col-xs-12 col-md-6 col-lg-6 text-right">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#trending" aria-controls="trending" role="tab" data-toggle="tab">Trending</a></li>
					<li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">History</a></li>
					<li role="presentation"><a href="#uploads" aria-controls="uploads" role="tab" data-toggle="tab">My Uploads</a></li>
				</ul>
			</div>
		</div>
		<div class="tab-content">
	    	<div role="tabpanel" class="tab-pane active" id="trending">
			<div class="videos-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/1.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rocky</a></p>
						<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/2.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Puggy</a></p>
						<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/3.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Jim</a></p>
						<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/4.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rosey</a></p>
						<p class="viewsdate">281,296 views &nbsp; 1 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/5.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Random</a></p>
						<p class="viewsdate">181,296 views &nbsp; 23 hours ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/6.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Husky33</a></p>
						<p class="viewsdate">31,296 views &nbsp; 18 hours ago</p>
					</div>
				</div>
			</div>

			<!-- WATCH IT AGAIN -->
			<div class="videos-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<h6>Watch it again</h6>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/7.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rocky</a></p>
						<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/8.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Puggy</a></p>
						<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/9.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Jim</a></p>
						<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/10.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rosey</a></p>
						<p class="viewsdate">281,296 views &nbsp; 1 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/11.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Random</a></p>
						<p class="viewsdate">181,296 views &nbsp; 22 hours ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/12.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Huskey33</a></p>
						<p class="viewsdate">31,296 views &nbsp; 18 hours ago</p>
					</div>
				</div>
			</div>

			<!-- RECOMMENDED -->
			<div class="videos-cont recom col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<h6>Recommended videos for you</h6>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/13.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rocky</a></p>
						<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/14.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Puggy</a></p>
						<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/15.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Jim</a></p>
						<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
					</div>
				</div>
			</div>
		</div>


		<!-- History -->
		<div role="tabpanel" class="tab-pane active" id="history">
			<div class="videos-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/1.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rocky</a></p>
						<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/2.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Puggy</a></p>
						<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/3.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Jim</a></p>
						<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/4.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rosey</a></p>
						<p class="viewsdate">281,296 views &nbsp; 1 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/5.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Random</a></p>
						<p class="viewsdate">181,296 views &nbsp; 23 hours ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/6.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Husky33</a></p>
						<p class="viewsdate">31,296 views &nbsp; 18 hours ago</p>
					</div>
				</div>
			</div>

			<!-- RECOMMENDED -->
			<div class="videos-cont recom col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<h6>Recommended videos for you</h6>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/13.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Rocky</a></p>
						<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/14.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Puggy</a></p>
						<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
					</div>
				</div>
				<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<img src="{{ URL::asset('assets/images/new/15.jpg') }}">
					<div class="vdetails">
						<a href="#">Funny Dogs Video</a>
						<p><span>by</span><a href="#"> Jim</a></p>
						<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
					</div>
				</div>
			</div>
		</div>


			<?php 
				if(Auth::check()){
					?>
						<!-- My Uploads -->
						<div role="tabpanel" class="tab-pane active" id="uploads">
							<div class="videos-cont col-sm-12 col-xs-12 col-md-12 col-lg-12">
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/1.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Rocky</a></p>
										<p class="viewsdate">581,296 views &nbsp; 1 week ago</p>
									</div>
								</div>
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/2.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Puggy</a></p>
										<p class="viewsdate">481,296 views &nbsp; 3 days ago</p>
									</div>
								</div>
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/3.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Jim</a></p>
										<p class="viewsdate">381,296 views &nbsp; 2 days ago</p>
									</div>
								</div>
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/4.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Rosey</a></p>
										<p class="viewsdate">281,296 views &nbsp; 1 days ago</p>
									</div>
								</div>
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/5.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Random</a></p>
										<p class="viewsdate">181,296 views &nbsp; 23 hours ago</p>
									</div>
								</div>
								<div class="vidthumb col-sm-12 col-xs-12 col-md-4 col-lg-4">
									<img src="{{ URL::asset('assets/images/new/6.jpg') }}">
									<div class="vdetails">
										<a href="#">Funny Dogs Video</a>
										<p><span>by</span><a href="#"> Husky33</a></p>
										<p class="viewsdate">31,296 views &nbsp; 18 hours ago</p>
									</div>
								</div>
							</div>
						</div>
					<?php
				}else{
					?>
			            <!-- My Uploads -->
						<div role="tabpanel" class="tab-pane active" id="uploads">
							<div class="videos-cont col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center" style="border-bottom: 0;">
								<a href="#" style="color: #b7062b; padding: 0 15px; font-size: 20px;">Login to upload videos</a>
							</div>
						</div>
					<?php
				}
			?>
	</div>
	</div>
</div>
