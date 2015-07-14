<!-- RIGHT BAR -->
@if(Auth::check())
<div>
  <div id="rocky-last-location"></div>
  <div class="pet-list">
    <ul>
      <li><a class="active" href="#"><img src="{{ URL::asset('assets/img/prof.png') }}" class="profile-pic"></a></li>
      <li><a href="#"><img src="{{ URL::asset('assets/img/puggy.png') }}" class="profile-pic"></a></li>
    </ul>
  </div>
</div>
@endif
<div>
  <div>
    <img src="{{ URL::asset('assets/img/gps.png') }}" class="img-responsive" width="100%">
  </div>
  <div class="button-group text-center">
    <a href="#" id="btn1"><span>LEARN MORE</span></a>
    <a href="#" id="btn2"><span>BUY NOW</span></a>
  </div>
</div>
<!-- END RIGHT BAR -->