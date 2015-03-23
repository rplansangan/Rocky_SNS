 <div class="header-container">
  <div class="container">
   <div class="col-md-6 col-lg-6 logo">
      <a href="{{ route('home') }}">
        <img src="{{ URL::asset('assets/images/rocky-logo.png') }}">
      </a>
    </div>
    <div class="col-md-6 col-lg-6 pt-links text-right">
       <a class="about"  href="#">About</a>
       <a class="privacy"  href="#">Privacy</a>
       <a class="terms" href="#">Terms</a>
     </div>
  </div>
</div>

@if($auth)
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 subhead-content">
   <div class="container">
     <ul class="nav nav-pills navbar-right">
        <li role="presentation"><a href="#">My Rocky</a></li>
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa fa-cog"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="">Change password</a></li>
            <li><a href="{{ route('logout') }}">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
@endif

@unless($auth)
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 subhead-content">
   <div class="container">
     <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 slogan">
      <h1>The Newest Community For Pet Lovers</h1>
    </div>

    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 login">
      <form action="{{ route('login') }}" method="POST" class="form-inline">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="email">Email</label><br/>
          <input type="email" name="email_address" id="email" class="form-control" placeholder=" email@example.com" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label><br/>
          <input type="password" name="password" id="password" class="form-control" placeholder=" password" required>
        </div>
        <button type="submit" class="btn btn-default">Login</button>
      </form>
    </div>
  </div>
</div>

@endunless