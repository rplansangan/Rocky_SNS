$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    $(document).on('click' , '#addMediaBtn' , function(){
        $( "#fileMedia" ).trigger( "click" );
    });

    $(document).on('click' , '.body' , function(){
        $('#load-search').addClass('hidden');
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
            $('.modal').modal('hide');
            location.reload();
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
            type: 'post',
            data : { post_id:id },
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
            $.ajax({
                url : $(this).attr('route'),
                type: 'post',
                data: { name:text },
                beforeSend:function(){
                    $('#load-search').html('<p class="text-center">Loading....</p>');
                },
                success:function(response){
                    $('#load-search').html(response);
                }
            }).done(function(){
                $('#load-search').removeClass('hidden').fadeIn();
            });
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
                type: 'post',
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
            type: 'post',
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
            type: 'post',
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
            type: 'post',
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

    $(document).on('click' , '#search , #loadMoreTrigger' , function(){
        $('#searchForm').trigger('submit');
    });


    $(document).on('click' , '#add_neighbor' , function(){
        var id = $(this).attr('user_id');
        var route = $(this).attr('route');
        var act = $(this).attr('data-act');
        var a = $(this);
        $.ajax({
            type:'post',
            url:route,
            data:{ requested_id:id , act:act },
            success:function(response){
                var d = JSON.parse(response);
                $('#friendStatusText').html(d.message);
                $(a).attr('data-act' , d.act);
            }
        });
    }); 

    $(document).on('click' , '.profile_menu' , function(){
        var href = $(this).attr('route');
        var viewit = $(this).attr('data-view');
        var id = $(this).attr('data-id');
        
        $.ajax({
            type:'post',
            url:href,
            data:{viewit:viewit , id:id},
            success:function(response){
               $('#viewloadhere').html(response);
            }
        });
    });

});

