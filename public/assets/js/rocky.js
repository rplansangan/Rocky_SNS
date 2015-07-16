$(document).ready(function(){

    $(document).on('click' , '#addMediaBtn' , function(){
      $( "#fileMedia" ).trigger( "click" );
    });

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('#form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.fadeIn().html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            $('.post-area').after(xhr.responseText);
            $("#form").trigger('reset');
        },
        success: function(){
            percent.fadeOut();
        }
    });

    $('#updateform').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.fadeIn().html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            alert(xhr.responseText);
        },
        success: function(){
            percent.fadeOut();
            $('.noPost').remove();
        }
    });

    $(document).on('click' , '.comment-down' , function(){
        $(this).parent().parent().parent().next().slideDown( "slow" );
        var id = $(this).attr('post-id');
        var route = $(this).attr('route');
        var ito = $(this);
        $.ajax({
            url : route,
            data : {post_id:id},
            beforeSend: function(){
                $(ito).parent().parent().parent().next().find('.comment_loading_area').hide().html('Loading...').fadeIn();
            },
            success: function(a){
                $(ito).parent().parent().parent().next().find('.comment_loading_area').html(a);
            }
        });
    });

    $(document).on('keyup' , '#search-top' , function(){
        var text = $(this).val();

        if(text != ''){
            $('#load-search').removeClass('hidden').fadeIn();
        }else{
            $('#load-search').addClass('hidden');
        }
     });

    $(document).on('keypress' , '.insertComment' , function (e) {
        var message = $(this).val();
        var route = $(this).attr('route');
        var id = $(this).attr('post-id');
        var userid = $(this).attr('post-user-id');
        var ito = $(this);
        if (e.which == 13 && message != '') {
            $.ajax({
                url : route,
                data : { post_id:id , message:message , post_user_id:userid },
                success: function(a){
                    $(ito).parent().parent().parent().find('.comment_loading_area').append(a);
                },
            }).done(function(){
                $('.insertComment').val('');
                $(ito).parent().parent().parent().find('.comment_loading_area').find('.noComment').remove();
            });
        }
    });


    $(document).on('click' , '.play' , function(){
        var src = $(this).attr('src');
        var route = $(this).attr('route');
        $('#videoModal').modal('show');
        $.ajax({
            url:route,
            data:{ src:src },
            success:function(response){
                $('.video-load').html(response);
            }
        });
    });

    $('.modal').on('hidden.bs.modal', function () {
      $("video")[0].pause();
      $("video")[0].currentTime = 0;
    });


    $(document).on('click' , '.clickLike' , function(){
        var postid = $(this).attr('post-id');
        var destination = $(this).attr('destination');
        var route = $(this).attr('route');
        var likeImage = $(this).attr('like-image');
        var unlikeImage = $(this).attr('unlike-image');
        var route = $(this).attr('route');
        var ito = $(this);
        var count = $(this).find('span').text();

        $.ajax({
            url:route,
            data:{postid:postid,destination:destination},
            success:function(response){
                var data = JSON.parse(response);
                if(data.liked){
                    $(ito).find('img').attr('src' , likeImage);
                    $(ito).find('span').text(++count).addClass('like').removeClass('unlike');
                }else{
                    $(ito).find('img').attr('src' , unlikeImage);
                    $(ito).find('span').text(--count).addClass('unlike').removeClass('like');
                }
            }
        });

    });

    
    $(document).on('click' , '#loadMore' , function(){
        var newsfeedCount = $('.newsfeed').length;
        var route = $(this).attr('route');

        $.ajax({
            url:route,
            data:{ skip:newsfeedCount },
            beforeSend:function(){
                $('.newsfeed').last().after('<p class="text-center loadingText">Loading</p>');
            },
            success:function(response){
                $('.newsfeed').last().after(response);
            }
        }).done(function(){
            $('.loadingText').remove();
        });
    });
});

