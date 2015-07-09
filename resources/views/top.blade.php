<div class="header-container">
  <div class="content">
      <div class="inside-top col-xs-12 col-sm-12 col-m-12 col-lg-12">
        <div class="col-md-1 col-lg-1 inside-logo">
          <a href="{{ route('index') }}"><img class="img-responsive" src="{{ URL::asset('assets/images/rlysmall2.png') }}"></a>
        </div>
        <div class="col-md-4 col-lg-4 search">
            <div id="tfheader">
              <form id="tfnewsearch" method="get" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" id="tfq" class="tftextinput4" name="name" size="21" maxlength="120">
                    <input type="submit" value=" " class="tfbutton4">
              </form>
              <div class="tfclear"></div>
            </div>
        </div>
        <div class="col-md-7 col-lg-7 in-menus text-right">
          <ul>
            <?php 
              if(Auth::check()){
                ?>
                  <li><a href="{{ route('uc') }}"><img src="{{ mediaSrc($profile->prof_pic->image_path , $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" width="38px" style=" margin-right: 10px;"><?php echo $profile->first_name.' '.$profile->last_name?></a></li>
                <?php
              }else{
                ?>
                  <li><a href="javascript:void(0)"><img src="{{ URL::asset('assets/images/default-pic.png') }}" width="38px" style="border-radius: 6px;">&nbsp; Guest</a></li>
                <?php
              }
            ?>
            <li style=" margin-top: 8px;"><span class="line" style="margin-left: 5px;">&nbsp;</span>
            <li style=" margin-top: 3px;"><a href="{{ route('home') }}" style="margin-right: 5px;">Home</a></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/friends-icon.png') }}" width="38px"></a></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/msg-icon.png') }}" width="38px"></a></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/notif-icon.png') }}" width="38px" style="margin-right: 5px;"></a></li>
            <li style=" margin-top: 8px;"><span class="line">&nbsp;</span></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/find-icon.png') }}" width="38px"></a></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/locate-icon.png') }}" width="28px"></a></li>
            <li style=" margin-top: 8px;"><span class="line" style="margin-left: 5px;">&nbsp;</span></li>
            <li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/images/new/dd-icon.png') }}" width="38px"></a></li>
          </ul>
        </div>
      </div>
  </div>
</div>