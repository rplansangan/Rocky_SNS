<?php use Illuminate\Support\Facades\Auth; ?>

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
        <li role="presentation"><a href="{{  route('home') }}">Home</a></li>
          @if (Request::url() == route('profile.showProfile', Auth::id()))
            <li role="presentation"><a href="{{ route('profile.petlist', Auth::user()->user_id) }}">Pets</a></li>
          @else
            <li role="presentation"><a href="{{ route('profile.showProfile', Auth::id()) }}">{{ Auth::user()->registration->first_name }} {{ Auth::user()->registration->last_name }}</a></li>
          @endif
        <li role="presentation"><a href="{{  route('search') }}">Search</a></li>
        <li role="presentation"><a href=""><span class="glyphicon glyphicon-bell"></span></a></li>
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa fa-cog"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('register.petdetails', Auth::id()) }}">Add A Pet</a></li>
            <li><a href="{{ route('settings') }}">Profile Settings</a></li>
            <li><a href="">Change password</a></li>
            <li><a href="{{ route('logout') }}">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
@else
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/set1.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/normalize.css') }}" />

  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 subhead-content">
   <div class="container">
     <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 slogan">
      <h1>The Newest Community For Pet Lovers</h1>
    </div>

    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 login">
      <form action="{{ route('login') }}" method="POST" class="form-inline">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="col-md-5 col-lg-5">
          <input type="email" name="email_address" id="input-10" required />
          <label for="input-10">
            <span placeholder="Email Address">Email</span>
          </label>
        </span>
        <span class="col-md-5 col-lg-5">
          <input type="password" name="password" id="input-11" required />
          <label for="input-11">
            <span placeholder="Password">Password</span>
          </label>
        </span>
        <span class="col-md-2 col-lg-2">
          <button type="submit" class="btn btn-default">Login</button>
        </span>
      </form>
    </div>
  </div>
</div>

<script src="{{ URL::asset('assets/js/classie.js') }}"></script>
    <script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();
    </script>
@endif
