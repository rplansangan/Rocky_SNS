<header>
  <div class="container-fluid">
    <div class="col-lg-2 col-sm-4 col-xs-4 col-md-4">
      <a href="{{ Route('index')}}"><img src="{{ URL::asset('assets/img/logo.png') }}" class="img-responsive logo"></a>
    </div>
    <div class="col-lg-3 hidden-sm hidden-md hidden-xs">
      <form action="{{ route('neighbors.search') }}" method="GET" id="searchForm">
         <input type="text" autocomplete="off" name="neighbors" id="search-top" route="{{ Route('do.search') }}" class="form-control">
         <a href="#"><img src="{{ URL::asset('assets/img/search.png') }}" id="search" ></a>
      </form>
      <div id="load-search" class="hidden">
          <p class="text-center">Loading...</p>
      </div>
    </div>
    <div class="col-lg-7 col-sm-8 col-xs-8 col-md-8 ">
      @if(Auth::check())
      <nav class="hidden-sm hidden-xs">
        <ul>
          @if(!$user_data->isNotNull('prof_pic'))
          <li>
            <a href="{{ Route('profile.view' , ['id' => $user_data->user_id] ) }}">
              <img src="{{ URL::asset('assets/images/default-pic.png') }}">
              <span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
            </a>
          </li>
          @else
          <li>
            <a href="{{ Route('profile.view' , ['id' => $user_data->user_id] ) }}">
              <img src="<?php echo mediaSrc($user_data->prof_pic->image_path, $user_data->prof_pic->image_name, $user_data->prof_pic->image_ext); ?>">
              <span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
            </a>
          </li>
          @endif
          <li><a href="{{ Route('home') }}"><span>Home</span></a></li>
          <li><a href="{{ route('public.neighbors') }}"><img src="{{ URL::asset('assets/img/neighbors.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/message.png') }}"></a></li>
          <li>
            <a href="javascript:void(0);" id="showNotif" route="{{ route('get.notification') }}" ><img src="{{ URL::asset('assets/img/notification.png') }}"></a>
            <div class="notification-area arrow_box text-left" data-collapse="close"></div>
          </li>
          <li><a href="{{ Route('public.missingpets') }}"><img src="{{ URL::asset('assets/img/find.png') }}"></a></li>
          <li><a href="{{ Route('uc') }}"><img src="{{ URL::asset('assets/img/track.png') }}"></a></li>
          <li><a href="javascript:void(0);"><img src="{{ URL::asset('assets/img/settings.png') }}"></a>
            <ul class="arrow_box">
              <li><a href="{{ Route('profile.settings') }}">Settings</a></li>
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
          <a href="#"><small style="color: #B7042C;">Forgot Password?</small></a>
        </div>
        <button type="submit" class="btn btn-default" style="margin-top:-20px;">Sign in</button>
      </form>
      @endif
    </div>
  </div>
</header>
<progress class="bar percent" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:2px;border:1px solid rgba(0,0,0,0.2);position:absolute;display:hidden"></progress>
<div class="push-down"></div>

