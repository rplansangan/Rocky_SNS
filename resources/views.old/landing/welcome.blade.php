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
    </head>
    <body>
     <input type="hidden" id="token" value="{{ csrf_token() }}">
     <input type="hidden" id="route" value="{{ Route('login') }}">
     <div class="container-fluid nopad" id="landing">
      @include('landing.top')
       <!-- SLIDER -->
       <div style="height:550px;">
        <div id="sliderdiv1">
          <div id="sliderdiv2">
            <div id="slider1">
              <div>
                <img src="{{ URL::asset('assets/images/landing/a.gif') }}" alt="b02" width="1260px" height="740px" />
                <div class="item text-center" style="margin-top:-500px;">    
                  <div class="text-center" id="sl">
                    <img src="{{ URL::asset('assets/images/landing/logo.png') }}" class="img-responsive" id="layer1">
                    <div class="button-group">
                      <a href="#" id="btn1">Learn More</a>
                      <a class="signup_btn" data-toggle="modal" data-target="#signupModal" href="#" id="btn2">Join Now</a>
                      <br>
                      <label>
                        <a class="login_btn" data-toggle="modal" data-target="#loginModal" href="#">Already a member? LOGIN</a>
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
      </div>
      <!-- END SLIDER -->
      <!-- SECTION -->
      <section class="text-right nopad">
        <div style="width:71%;margin:0 auto;">
          <div class="col-lg-6">
            <img src="{{ URL::asset('assets/images/landing/dog3.png') }}" class="img-responsive" id="layer2" style="top: 123px;">
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
              <a class="signup_btn" data-toggle="modal" data-target="#signupModal" href="#" id="btn2">Join Now</a>
            </div>
          </div>
        </div>
      </section>
      <section class="text-left nopad landing-bg-section-2">
        <div style="width:69.2%;margin:0 auto;">
          <div class="col-lg-6 ">
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
        <div style="width:71%;margin:0 auto;">
          <div class="col-lg-6">
            <img src="{{ URL::asset('assets/images/landing/dog5.png') }}" class="img-responsive" id="layer2" style="margin-top: 132px;">
          </div>
          <div class="col-lg-6 ">
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
            <div style="width:69%;margin:0 auto;height:100%;">
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
      @include('include.formlogin')
</body>
</html>
