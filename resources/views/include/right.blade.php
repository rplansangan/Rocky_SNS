<!-- RIGHT BAR -->
<div>
  <nav class="ffbtns">

    <p><a href="#" data-toggle="modal" data-target="#missingPet" class="findbtn">FIND A PET</a></p>
    <p><a href="#" data-toggle="modal" data-target="#foundpet" class="foundbtn">I FOUND A PET</a></p>
  </nav>
</div>

<div>
  <div class="bxright">
    <label class="text-muted">Funny Videos</label>
    <div class="video-content">
      <div>
        <img src="{{ URL::asset('assets/img/vid1.jpg') }}" class="img-responsive thumb">
      </div>
      <a href="javascript:void(0);" route="#" class="play"><img src="{{ URL::asset('assets/img/play.png') }}" class="img-responsive"></a>
    </div>
    <div class="video-content">
      <div>
        <img src="{{ URL::asset('assets/img/vid2.jpg') }}" class="img-responsive thumb">
      </div>
      <a href="javascript:void(0);" route="#" class="play"><img src="{{ URL::asset('assets/img/play.png') }}" class="img-responsive"></a>
    </div>
    <div class="video-content">
      <div>
        <img src="{{ URL::asset('assets/img/vid3.jpg') }}" class="img-responsive thumb">
      </div>
      <a href="javascript:void(0);" route="#" class="play"><img src="{{ URL::asset('assets/img/play.png') }}" class="img-responsive"></a>
    </div>
  </div>
</div>

<div>
  <div class="bxright">
    <label class="text-muted">Pet of the Week</label>
    <div class="video-content">
      <div>
        <a href="#" data-toggle="modal" data-target="#pwoneModal">
          <img src="{{ URL::asset('assets/img/nom1-large.jpg') }}" class="img-responsive thumb">
        </a>
      </div>
    </div>
    <div class="video-content">
      <div>
         <a href="#" data-toggle="modal" data-target="#pwtwoModal">
          <img src="{{ URL::asset('assets/img/nom2-large.jpg') }}" class="img-responsive thumb">
        </a>
      </div>
    </div>
    <div class="video-content">
      <div>
        <a href="#" data-toggle="modal" data-target="#pwthrModal">
          <img src="{{ URL::asset('assets/img/nom3-large.jpg') }}" class="img-responsive thumb">
        </a>
      </div>
    </div>
  </div>
</div>

<div class="missingpets-area text-center">
  <img src="{{ URL::asset('assets/img/post1.jpg') }}" class="img-responsive">
  <div>
    <legend><h2>Sonic</h2></legend>
    <h2>Missing <br><small>02 DAYS</small></h2>
    <a href="#"><span>VIEW</span></a>
  </div>
</div>
<div class="missingpets-area text-center">
  <img src="{{ URL::asset('assets/img/post2.jpg') }}" class="img-responsive">
  <div>
    <legend><h2>Jorge</h2></legend>
    <h2>Missing <br><small>04 DAYS</small></h2>
    <a href="#"><span>VIEW</span></a>
  </div>
</div>
<!-- END RIGHT BAR -->