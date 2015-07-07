<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Rocky Superdog</title>

  <!-- Bootstrap -->
  <link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/style2.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
      <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ URL::asset('assets/js/bxslider.js') }}"></script>
      <script type="text/javascript">
      $(document).ready(function() {
        var sliderBx;
        window.onedir = 'next';
        
        sliderBx = $('#slider1').bxSlider({
          auto: true,
          autoControls: true,
          autoControlsSelector: '#my-start-stop',
          slideWidth: 1160,
          speed: 700,
          autoStart: false
        });

        $('.bx-next').click(function() {
          window.onedir = 'next';
          sliderBx.startShow();           
        });
        
        $('.bx-prev').click(function() {
          window.onedir = 'prev';
          sliderBx.startShow();     
        });
      });
      </script>
    </head>
    <body>
      <div class="container-fluid nopad" id="landing">
        <!-- HEADER -->
        <header class="container-fluid">
          <div class="col-lg-1">
            <a href="#"><img src="{{ URL::asset('assets/images/landing/rlysmall.png') }}" class="img-responsive"></a>
          </div>
          <div class="col-lg-11">
            <nav class="text-right">
              <ul>
                <li><a href="#">ABOUT</a></li>
                <li><a href="{{ route('public.nearestpetshop') }}">PET NEEDS</a></li>
                <li><a href="{{ route('public.dogsoftheweek') }}">DOGS OF THE WEEK</a></li>
                <li><a class="active" href="#">ROCKY RANGER</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <!-- END HEADER -->

 <!-- SLIDER -->
    <div id="sliderdiv1">
        <div id="sliderdiv2">
            <div id="slider1">
                <div>
                    <img src="{{ URL::asset('assets/images/landing/a.gif') }}" alt="b02" width="1260px" height="740px" />
                    <div class="item text-center">    
                        <div class="text-center" id="sl">
                            <img src="{{ URL::asset('assets/images/landing/layer.png') }}" class="img-responsive" id="layer1">
                            <img src="{{ URL::asset('assets/images/landing/rs.png') }}" class="img-responsive" id="layer2"> 
                            <h2>The community for your furry buddy</h2>
                            <div class="button-group">
                                <a href="#" id="btn1">Learn More</a>
                                <a href="#" id="btn2">Join Now</a>
                                <br>
                                <label>
                                    <a href="#">Already a member? LOGIN</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="{{ URL::asset('assets/images/landing/slider1.jpg') }}" alt="b02" width="1260px" height="740px" />
                    <div class="item">
                        <h1 class="text-center"><small>WHO WOULD YOU TURN TO</small><br/> IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                    </div>
                </div>
                <div>
                    <img src="{{ URL::asset('assets/images/landing/slider2.jpg') }}" alt="b02" width="1260px" height="740px" />
                    <div class="item">
                        <h1 class="text-center"><small>WHO WOULD YOU TURN TO</small><br/> IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                    </div>
                </div>
                <div>
                    <img src="{{ URL::asset('assets/images/landing/slider3.jpg') }}" alt="b03" width="1260px" height="740px" />
                    <div class="item">
                        <h1 class="text-center"><small>WHO WOULD YOU TURN TO</small><br/> IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END SLIDER -->
    <!-- SECTION -->
    <section class="text-right nopad">
        <div style="width:50%;margin:0 auto;">
            <div class="col-lg-6">
                <img src="{{ URL::asset('assets/images/landing/layer.png') }}" class="img-responsive" id="layer1">
                <img src="{{ URL::asset('assets/images/landing/dog3.png') }}" class="img-responsive" id="layer2" style="top: 50px;">
            </div>
            <div class="col-lg-6 ">
                <h1>WHY JOIN<br> ROCKY SUPERDOG</h1>
                <p>Join us so you can be contacted when<br>
                    matching lost and founddogs are added<br>
                    to our database. Rocky Superdog is fueled<br>
                    by a team of passionate pet lovers - we<br>
                    provide the best for your furry friend
                </p>
                <div class="button-group">
                    <a href="#" id="btn2">Join Now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="text-left nopad landing-bg-section-2">
        <div style="width:50%;margin:0 auto;">
            <div class="col-lg-6 ">
                <h1>ALL YOUR PET NEEDS</h1>
                <p>Bring your dog to Doggy Daycare and go<br>
                    to work guilt-free! From Vets to Groomers<br>
                    to Pet walkers - We have it all. Search by<br>
                    your location and read reviews.
                </p>
                <div class="button-group">
                    <a href="#" id="btn2">Browse</a>
                </div>
            </div>
        </div>
    </section>
    <section class="text-right nopad">
        <div style="width:50%;margin:0 auto;">
            <div class="col-lg-6">
                <img src="{{ URL::asset('assets/images/landing/layer.png') }}" class="img-responsive" id="layer1">
                <img src="{{ URL::asset('assets/images/landing/dog5.png') }}" class="img-responsive" id="layer2" style="top: 70px;">
            </div>
            <div class="col-lg-6 ">
                <h1>FIND MISSING PETS</h1>
                <p>Leverage on our community of pet lovers.<br>
                    If your pet goes missing, be sure that our<br>
                    passionate Rocky Rangers would locate<br>
                    your pet in no time
                    .</p>
                    <div class="button-group">
                        <a href="#" id="btn2">Browse</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="map ">
            <div style="width:70%;margin:0 auto;">
                <div class="col-lg-6">
                    <img src="{{ URL::asset('assets/images/landing/phone2.png') }}" class="img-responsive">
                </div>
                <div class="col-lg-6 ">
                    <h1>GPS Pet Tracker</h1>
                    <p class-"text-justified">Track your dog’s location using GPS and receive<br>
                        mobile alerts to find your pet if they ever get lost.<br>
                        Activity monitoring provides a window into their<br>
                        well-being and so you know your dog is healthy<br>
                        and safe.
                    </p>
                    <div class="button-group">
                        <a href="#" id="btn1">Learn More</a>
                        <a href="#" id="btn2">Buy Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION -->
              <!-- FOOTER -->
              <footer class="text-center">
                <div class="footer-subscribe">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Your Email Address">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Subscribe</button>
                    </span>
                  </div><!-- /input-group -->
                  <div style="padding-top:20px;">
                  	<a href="#" style="padding-top:20px;"><i class="fa fa-facebook-square fa-2x"></i></a>
                  	<a href="#" style="padding-top:20px;"><i class="fa fa-instagram fa-2x"></i></a>
                  </div>
                </div>
                <nav class="col-lg-12">
                    <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">Blog</a></li>
                      <li><a href="#">Business Inquiries</a></li>
                      <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Terms of Use</a></li>
                      <li><a href="#">Refund Policy</a></li>
                    </ul>
                  </nav>
                <div class="col-lg-12">
                  <p>Copyright <i class="fa fa-copyright"></i> ROCKYSUPERDOG 2015</p>
                </div>
              </footer>
              <!-- END FOOTER -->
            </div>
          </body>
          </html>