 <div class="header-container">
  <div class="container">
   <div class="col-md-6 col-lg-6 logo">
      <img src="{{ URL::asset('assets/images/rocky-logo.png') }}">
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
        <li role="presentation"><a href="#">Settings</a></li>
      </ul>
    </div>
  </div>
@endif

@unless($auth)
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 subhead-content">
   <div class="container">
     <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 slogan">
      <h1>The Newest Community For Dog Lovers</h1>
    </div>

    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 login">
      <form class="form-inline">
        <div class="form-group">
          <label for="email">Email</label><br/>
          <input type="email" name="email" id="email" class="form-control" placeholder=" email@example.com" required>
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