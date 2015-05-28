 <input type="hidden" id="user-check" value="{{ route('index') }}">
 <div class="header-container">
  <div class="container">
    <div class="col-md-4 col-lg-4 logo">
      <img src="{{ URL::asset('assets/images/rocky-logo.png') }}">
    </div>
    <div class="col-md-4 col-lg-4 tagnum">
      <div class="formtag">
        <form>
          <div class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="left" title="If you found a pet that has a tag number, please enter it in the input text and hit enter then proceed to the next step."></div>
          <input type="text" class="inputag foundpettag"  placeholder="Input pet tag number">
          <button zia="{{ Route('pets.get.info') }}" token="{{ csrf_token() }}" class="tagbtn">ENTER</button>
        </form>
      </div>
      <div class="missfounbtn">
        <a href="javascript:void(0)" class="misspet" data-toggle="tooltip" data-placement="left" title="If you've lost your pet, please login and click the 'Rocky, find my pet' button and fillup the form.">Rocky, find my pet</a>
        <a href="javascript:void(0)" class="foundpet" data-toggle="tooltip" data-placement="left" title="If you found a pet but doesn't have a tag number, click the 'I found a pet!' button and fillup the form.">I found a pet!</a>
      </div>
    </div>
    <div class="col-md-4 col-lg-4 pt-links text-right">
       <a class="about"  href="#">About</a>
       <a class="privacy"  href="#">Privacy</a>
       <a class="terms" href="#">Terms</a>
     </div>
  </div>
</div>
@if(auth()->check())
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 subhead-content">
   <div class="container">
     <ul class="nav nav-pills navbar-right">
        <li role="presentation"><a href="{{  route('home') }}">Home</a></li>
          @if (Request::url() == route('profile.showProfile', auth()->id()))
            <li role="presentation"><a href="{{ route('profile.petlist', Auth::user()->user_id) }}">Pets</a></li>
          @else
            <li role="presentation"><a href="{{ route('profile.showProfile', Auth::id()) }}">
              @if(Auth::user()->is_foundation === 1 || Auth::user()->is_vet === 1)
                Profile
              @else
                {{ auth()->user()->registration->first_name }} {{ Auth::user()->registration->last_name }}
              @endif
            </a></li>
          @endif
        @if(Auth::user()->is_vet === 1)
          <li role="presentation"><a href="#">Management</a></li>
        @endif
        <li role="presentation"><a href="{{  route('search') }}">Search</a></li>
        <li role="presentation">
          <a href=""><span class="glyphicon glyphicon-envelope"></span></a>
        </li>
        <li id="nav-notif" role="presentation">
        	<a href=""><span class="glyphicon glyphicon-bell"></span></a>
        	<ul id="notif-main">
        	<div id="notif-header"><strong>Notifications</strong></div>
        	@if($user_notifs)
	        	{!! $user_notifs !!}
	        @else 
	        	No notification.
        	@endif
        	</ul>
        </li>
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa fa-cog"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('register.petdetails', Auth::id()) }}">Add A Pet</a></li>
            <li><a href="{{ route('profile.settings') }}">Profile Settings</a></li>
            <li><a href="{{ route('profile.get.view') }}">Change password</a></li>
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
    @if (Request::url() == route('login.attempt'))
      <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 login">
        <input type="hidden">
      </div>
    @else
      <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 login">
        <form action="{{ route('login') }}" method="POST" class="form-inline">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <span class="col-md-5 col-lg-5">
            <label for="input-10">
              <span placeholder="Email Address">Email</span>
            </label>
            <input type="email" name="email_address" id="input-10" required />
          </span>
          <span class="col-md-5 col-lg-5">
            <label for="input-11">
              <span placeholder="Password">Password</span>
            </label>
            <input type="password" name="password" id="input-11" required />
            <a href="{{ route('login.forgot') }}">Forgot password</a>
          </span>
          <span class="col-md-2 col-lg-2">
            <button type="submit" class="btn btn-default">Login</button>
          </span>
        </form>
      </div>
    @endif
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
