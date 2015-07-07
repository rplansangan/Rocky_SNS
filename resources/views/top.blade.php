@if(Request::url() == route('index'))
<div class="container-fluid nopad" id="landing">
  <!-- HEADER -->
  <header class="container-fluid">
    <div class="col-lg-1">
      <a href="#"><img src="{{ URL::asset('assets/images/landing/rlysmall.png') }}" class="img-responsive"></a>
    </div>
    <div class="col-lg-11">
      <nav class="text-right">
        <ul>
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">PET NEEDS</a></li>
          <li><a href="#">DOGS OF THE WEEK</a></li>
          <li><a class="active" href="#">ROCKY RANGER</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- END HEADER -->
</div>
@else
<div class="header-container">
  <div class="content">
    <div class="inside-top col-xs-12 col-sm-12 col-m-12 col-lg-12">
      <div class="col-md-1 col-lg-1 inside-logo">
        <a href="{{ route('index') }}"><img class="img-responsive" src="{{ URL::asset('assets/images/rlysmall2.png') }}"></a>
      </div>
      <div class="col-md-4 col-lg-4 search">
        <div id="tfheader">
          <form id="tfnewsearch" method="get" action="{{ Route('search') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" id="tfq" class="tftextinput4" name="name" size="21" maxlength="120">
            <input type="submit" value=" " class="tfbutton4">
          </form>
          <div class="tfclear"></div>
        </div>
      </div>
      <div class="col-md-7 col-lg-7 in-menus text-right">
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