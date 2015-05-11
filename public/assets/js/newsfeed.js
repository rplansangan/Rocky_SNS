alreadyloading = false;
$(window).scroll(function() {
    if ($('body').height() <= ($(window).height() + $(window).scrollTop())) {
        if (alreadyloading == false) {
           alreadyloading = true;
           var items = $("#home-newsfeed > li").length;
           var route = $('#route-newsfeed-refresh').val();
           var token = $('#route-newsfeed-refresh').attr('_token');
           var post_uid = $('#post_uid').val();
           var cur_prof = $('#profile_id').val();
           $.ajax({
            url : route,
            type : 'post',
            data: { offset:items , _token:token, post_uid:post_uid, cur_prof:cur_prof},
            success: function(r){
               if(r != "0"){
                  $('#home-newsfeed').append(r);
                  alreadyloading = false;
              }
          }
      });
       }
   }
});
$(document).on('click' , '#refresh-btn' , function(){
    var url = $(this).attr('value');
    var url2 = $('#update-route').val();
    $.get(url , function(a){
        $('#refresh-btn').addClass('hidden');
        $(a).hide().fadeIn().insertBefore('.append-post > li:first-child');
    });
    $.get(url2);
});

setInterval(function(){ 
    var url = $('#check-refresh-route').val();
    $.get( url , function( data ) {
        if(data != '0'){
            $('#refresh-btn').removeClass('hidden');
        }
    });
}, 30000);