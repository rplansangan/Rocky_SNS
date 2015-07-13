<header>
  <div class="container-fluid">
    <div class="col-lg-2 ">
      <a href="{{ Route('index')}}"><img src="{{ URL::asset('assets/img/logo.png') }}" class="img-responsive logo"></a>
    </div>
    <div class="col-lg-3 hidden-sm hidden-xs">
      <input type="text" name="search" class="form-control">
      <a href="#"><img src="{{ URL::asset('assets/img/search.png') }}" id="search"></a>
    </div>
    <div class="col-lg-7 hidden-sm hidden-xs">
      @if(Auth::check())
      <nav>
        <ul>
          @if(!isset($profile->prof_pic) AND Auth::check())
          <li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}"><span>{{ $profile->first_name.' '.$profile->last_name }}</span></a></li>
          @elseif(Auth::check())
          <li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="{{ mediaSrc($profile->prof_pic->image_path , $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}"><span>{{ $profile->first_name.' '.$profile->last_name }}</span></a></li>
          @endif
          <li><a href="{{ Route('home') }}"><span>Home</span></a></li>
          <li><a href="{{ route('public.neighbors') }}"><img src="{{ URL::asset('assets/img/neighbors.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/message.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/notification.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/find.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/track.png') }}"></a>
            <ul class="arrow_box">
              <li><a href="#">option1</a></li>
              <li><a href="#">option2</a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0);"><img src="{{ URL::asset('assets/img/settings.png') }}"></a>
            <ul class="arrow_box">
              <li><a href="{{ Route('uc') }}">Settings</a></li>
              <li><a href="{{ Route('logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      @endif
    </div>
  </div>
</header>



