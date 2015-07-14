<header>
  <div class="container-fluid">
    <div class="col-lg-2 col-sm-4 col-xs-4 col-md-4">
      <a href="{{ Route('index')}}"><img src="{{ URL::asset('assets/img/logo.png') }}" class="img-responsive logo"></a>
    </div>
    <div class="col-lg-3 hidden-sm hidden-md hidden-xs">
      <input type="text" name="search" id="search-top" class="form-control">
      <a href="#"><img src="{{ URL::asset('assets/img/search.png') }}" id="search"></a>
      <div id="load-search" class="hidden text-center">
          <p>Loading...</p>
      </div>
    </div>
    <div class="col-lg-7 col-sm-8 col-xs-8 col-md-8 ">
      @if(Auth::check())
      <nav class="hidden-sm hidden-xs">
        <ul>
          @if(!isset($user_data['profile_picture_path']) AND Auth::check())
          <li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}"><span><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></span></a></li>
          @elseif(Auth::check())
          <li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="<?php echo mediaSrcAlt($user_data['profile_picture_path'], $user_data['profile_picture_ext']); ?>"><span><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></span></a></li>
          @endif
          <li><a href="{{ Route('home') }}"><span>Home</span></a></li>
          <li><a href="{{ route('public.neighbors') }}"><img src="{{ URL::asset('assets/img/neighbors.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/message.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/notification.png') }}"><i class="fa fa-exclamation"></i></a></li>
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
      @else
      <form class="form-inline form-signin" method="POST" action="{{ route('login') }}" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group text-left">
          <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <input type="email" class="form-control" name="email_address" placeholder="Email">
          <br>
          <div class="checkbox nopad">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
        </div>
        <div class="form-group text-left">
          <label class="sr-only" for="exampleInputPassword3">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <br>
          <a href="#"><small>Forgot Password?</small></a>
        </div>
        <button type="submit" class="btn btn-default" style="margin-top:-20px;">Sign in</button>
      </form>
      @endif
    </div>
  </div>
</header>
<progress class="bar percent" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:2px;border:1px solid black;position:absolute"></progress>
<div class="push-down"></div>

