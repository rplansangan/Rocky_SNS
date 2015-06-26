<input type="hidden" id="user-check" value="{{ route('index') }}">
<input type="hidden" id="user-chtwo" value="{{ route('signup') }}">
<div class="header-container">
  <div class="content">
      <div class="land-menus col-xs-12 col-sm-12 col-m-12 col-lg-12">
        <div class="col-md-3 col-lg-3 logo">
          <a href="{{ route('index') }}"><img class="img-responsive" src="{{ URL::asset('assets/images/rlysmall.png') }}"></a>
        </div>
        <div class="col-md-9 col-lg-9 land-nav-menu">
          <ul>
            <li><a class="parent" href="#">PET LOVERS</a></li>
            <li class="has-sub">
              <a class="parent" href="#">PET NEEDS</a>
              <ul>
                <li><a href="">VETS</a></li>
                <li><a href="">GROOMERS</a></li>
                <li><a href="">WALKERS</a></li>
                <li><a href="">SHOPS</a></li>
              </ul>
            </li>
            <li><a class="parent" href="#">PET VIDEOS</a></li>
            <li><a class="parent" href="#">PET FOUNDATIONS</a></li>
            <li><a class="parent" href="#">ROCKY RANGER</a></li>
          </ul>
        </div>
      </div>
  </div>
</div>