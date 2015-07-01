<input type="hidden" id="user-check" value="{{ route('index') }}">
<input type="hidden" id="user-chtwo" value="{{ route('signup') }}">

@if(Request::url() == route('index'))
<div class="header-container">
  <div class="content">
      <div class="land-menus col-xs-12 col-sm-12 col-m-12 col-lg-12">
        <div class="col-md-3 col-lg-3 logo">
          <a href="{{ route('index') }}"><img class="img-responsive" src="{{ URL::asset('assets/images/rlysmall.png') }}"></a>
        </div>
        <div class="col-md-9 col-lg-9 land-nav-menu">
          <ul>
            <li><a class="parent" href="{{ route('public.lovers') }}">PET LOVERS</a></li>
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
@else
<div class="header-container">
  <div class="content">
      <div class="inside-top col-xs-12 col-sm-12 col-m-12 col-lg-12">
        <div class="col-md-1 col-lg-1 inside-logo">
          <a href="{{ route('index') }}"><img class="img-responsive" src="{{ URL::asset('assets/images/rlysmall2.png') }}"></a>
        </div>
        <div class="col-md-3 col-lg-3 search">
            <div id="tfheader">
              <form id="tfnewsearch" method="get" action="http://www.google.com">
                      <input type="text" id="tfq" class="tftextinput4" name="q" size="21" maxlength="120"><input type="submit" value=" " class="tfbutton4">
              </form>
              <div class="tfclear"></div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 in-menus text-right">
            <a href="#"><img src="{{ URL::asset('assets/images/new/prof-icon.png') }}" width="38px" style=" margin-right: 10px;">Rocky</a>
            <span class="line" style="margin-left: 5px;">&nbsp;</span>
            <a href="{{ route('public.lovers') }}" style="margin-right: 5px;">Home</a>
            <a href="#"><img src="{{ URL::asset('assets/images/new/friends-icon.png') }}" width="38px"></a>
            <a href="#"><img src="{{ URL::asset('assets/images/new/msg-icon.png') }}" width="38px"></a>
            <a href="#"><img src="{{ URL::asset('assets/images/new/notif-icon.png') }}" width="38px" style="margin-right: 5px;"></a>
            <span class="line">&nbsp;</span>
            <a href="#"><img src="{{ URL::asset('assets/images/new/find-icon.png') }}" width="38px"></a>
            <a href="#"><img src="{{ URL::asset('assets/images/new/locate-icon.png') }}" width="28px"></a>
            <span class="line" style="margin-left: 5px;">&nbsp;</span>
            <a href="#"><img src="{{ URL::asset('assets/images/new/dd-icon.png') }}" width="38px"></a>
        </div>
      </div>
  </div>
</div>
@endif