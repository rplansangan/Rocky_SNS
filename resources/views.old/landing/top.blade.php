<!-- HEADER -->
<header class="container-fluid">
  <div class="col-lg-1">
    <a href="#"><img src="{{ URL::asset('assets/images/landing/rlysmall.png') }}" class="img-responsive"></a>
  </div>
  <div class="col-lg-11">
    <nav class="text-right">
      <ul>
        <li><a href="#">ABOUT</a></li>
        <li><a href="{{ route('public.nearestpetshop') }}">PET NEEDS</a></li>
        <li><a href="{{ route('public.dogsoftheweek') }}">DOGS OF THE WEEK</a></li>
        <li><a class="active" href="#">ROCKY RANGER</a></li>
      </ul>
    </nav>
  </div>
</header>
<!-- END HEADER -->