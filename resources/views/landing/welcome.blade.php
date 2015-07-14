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
      <script src="{{ URL::asset('assets/js/jquery-form.js') }}"></script>
      <script src="{{ URL::asset('assets/js/rocky2.js') }}"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          var sliderBx;
          window.onedir = 'next';

          sliderBx = $('#slider1').bxSlider({
            auto: true,
            autoControls: true,
            autoControlsSelector: '#my-start-stop',
            slideWidth: 1100,
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
     <input type="hidden" id="token" value="{{ csrf_token() }}">
     <input type="hidden" id="route" value="{{ Route('login') }}">
     <div class="container-fluid nopad" id="landing">
      @include('landing.top')
       <!-- SLIDER -->
       
      <!-- END SLIDER -->
      <!-- NEW -->
      <div id="container">
          <div id="sliderdiv1">
              <div id="sliderdiv2">
                  <div id="slider1">
                      <div>
                        <img src="{{ URL::asset('assets/images/landing/slider4.png') }}" alt="b01" width="1260px" height="640px" />
                          <div class="button-group">
                            <a href="#" id="btn1">Learn More</a>
                            <a class="signup_btn" data-toggle="modal" data-target="#signupModal" href="#" id="btn2">Join Now</a>
                            <br>
                            <label>
                              <a class="login_btn" data-toggle="modal" data-target="#loginModal" href="#">Already a member? LOGIN</a>
                            </label>
                          </div>
                      </div>
                      <div>
                        <img src="{{ URL::asset('assets/images/landing/slider1.jpg') }}" alt="b01" width="1260px" height="640px" />
                        <div class="item">
                          <p>WHO WOULD YOU TURN TO</p>
                          <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                          <a href="#" class="learn" target="_parent">LEARN MORE</a>
                          <a href="#" class="join" target="_parent">JOIN NOW</a>
                        </div>
                      </div>
                      <div>
                        <img src="{{ URL::asset('assets/images/landing/slider2.jpg') }}" alt="b01" width="1260px" height="640px" />
                        <div class="item">
                          <p>WHO WOULD YOU TURN TO</p>
                          <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                          <a href="#" class="learn" target="_parent">LEARN MORE</a>
                          <a href="#" class="join" target="_parent">JOIN NOW</a>
                        </div>
                      </div>
                      <div>
                        <img src="{{ URL::asset('assets/images/landing/slider3.jpg') }}" alt="b01" width="1260px" height="640px" />
                        <div class="item">
                          <p>WHO WOULD YOU TURN TO</p>
                          <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
                          <a href="#" class="learn" target="_parent">LEARN MORE</a>
                          <a href="#" class="join" target="_parent">JOIN NOW</a>
                        </div>
                      </div>
                  </div>
              </div>
          </div>   
      </div>
      <!-- END NEW -->
      <!-- SECTION -->
      <section class="text-right nopad">
        <div>
          <div class="col-lg-6 nopad">
            <img src="{{ URL::asset('assets/images/landing/dog3.png') }}" class="img-responsive" id="layer2" style="top: 123px;">
          </div>
          <div class="col-lg-6 nopad">
            <h1>WHY JOIN<br> ROCKY SUPERDOG</h1>
            <p>Join us so you can be contacted when<br>
              matching lost and founddogs are added<br>
              to our database. Rocky Superdog is fueled<br>
              by a team of passionate pet lovers - we<br>
              provide the best for your furry friend
            </p>
            <div class="button-group">
              <a class="signup_btn" data-toggle="modal" data-target="#signupModal" href="#" id="btn2">Join Now</a>
            </div>
          </div>
        </div>
      </section>
      <section class="text-left nopad landing-bg-section-2">
        <div>
          <div class="col-lg-6">
            <h1>ALL YOUR PET NEEDS</h1>
            <p>Bring your dog to Doggy Daycare and go<br>
              to work guilt-free! From Vets to Groomers<br>
              to Pet walkers - We have it all. Search by<br>
              your location and read reviews.
            </p>
            <div class="button-group">
              <a href="{{ route('public.nearestpetshop') }}" id="btn2">Browse</a>
            </div>
          </div>
        </div>
      </section>
      <section class="text-right nopad">
        <div>
          <div class="col-lg-6 nopad">
            <img src="{{ URL::asset('assets/images/landing/dog5.png') }}" class="img-responsive" id="layer2" style="margin-top: 132px;">
          </div>
          <div class="col-lg-6 nopad">
            <h1>FIND MISSING PETS</h1>
            <p>Leverage on our community of pet lovers.<br>
              If your pet goes missing, be sure that our<br>
              passionate Rocky Rangers would locate<br>
              your pet in no time
              .</p>
              <div class="button-group">
                <a href="{{ route('public.missingpets') }}" id="btn2">Browse</a>
              </div>
            </div>
          </div>
        </section>
        <section class="map">
            <div>
                <div class="col-lg-4 col-lg-offset-1">
                    <img src="{{ URL::asset('assets/images/landing/phone2.png') }}" style="width:250px"  >
                </div>
                <div class="col-lg-5 col-lg-offset-1">
                    <h1>GPS Pet Tracker</h1>
                    <p class-"text-right">Track your dog’s location using GPS and receive<br>
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
        @include('landing.footer')
      </div>
      @include('include.modal')
</body>
</html>
