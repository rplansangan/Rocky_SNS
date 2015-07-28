<script type="text/javascript">
$(document).ready(function(){
  var sliderBx;
  window.onedir = 'next';

  sliderBx = $('#slider1').bxSlider({
    auto: true,
    autoControls: true,
    autoControlsSelector: '#my-start-stop',
    slideWidth: 960,
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
<!-- HEADER -->
<div id="landing">
  <header class="container-fluid">
    <div class="col-lg-2">
      <a href="{{ Route('home') }}"><img src="{{ URL::asset('assets/images/landing/rlysmall.png') }}" class="img-responsive logo"></a>
    </div>
    <div class="col-lg-10">
      <nav class="text-right">
        <ul>
          <li><a href="#">ABOUT</a><br/><small><p></p>&nbsp;</small></li>
          <li><a href="{{ route('public.nearestpetshop') }}">PET NEEDS</a><br/><small><p></p>&nbsp;</small></li>
          <li><a href="{{ route('public.dogsoftheweek') }}">PET OF THE WEEK</a><br/><small><p></p>&nbsp;</small></li>
          <li><a data-toggle="modal" data-target="#missingPet" class="red" href="#">FIND A PET</a><br/>
            <small><p></p><a href="#" data-toggle="modal" data-target="#foundpet">I Found a Pet</a></small></li>
          <li><a class="orange" href="javascript:void(0);" data-toggle="modal" data-target="#signupModal">JOIN NOW</a><br/><small><p></p>&nbsp;</small></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- SLIDER -->
  <div id="container">
    <div id="sliderdiv1">
      <div id="sliderdiv2">
        <div id="slider1">
          <div>
            <img src="{{ URL::asset('assets/images/landing/slider4.png') }}" alt="b01" width="960px" height="540px" />
            <div class="button-group">
              <a href="#" id="btn1">Learn More</a>
              <a class="signup_btn" data-toggle="modal" data-target="#signupModal" href="javascript:void(0)" id="btn2">Join Now</a>
              <br>
              <label>
                <a class="login_btn" data-toggle="modal" data-target="#loginModal" href="javascript:void(0)">Already a member? LOGIN</a>
              </label>
            </div>
          </div>
          <div>
            <img src="{{ URL::asset('assets/images/landing/slider1.jpg') }}" alt="b01" width="960px" height="540px" />
            <div class="item">
              <p>WHO WOULD YOU TURN TO</p>
              <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
            </div>
          </div>
          <div>
            <img src="{{ URL::asset('assets/images/landing/slider2.jpg') }}" alt="b01" width="960px" height="540px" />
            <div class="item">
              <p>WHO WOULD YOU TURN TO</p>
              <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
            </div>
          </div>
          <div>
            <img src="{{ URL::asset('assets/images/landing/slider3.jpg') }}" alt="b01" width="960px" height="540px" />
            <div class="item">
              <p>WHO WOULD YOU TURN TO</p>
              <h1>IF YOU LOST <br/> YOUR BEST FRIEND?</h1>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
  <!-- END SLIDER -->
</div>
<!-- END HEADER -->
<div class="push-down"></div>