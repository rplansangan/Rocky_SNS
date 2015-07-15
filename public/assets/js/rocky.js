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
        }
    });
    $(document).on('click' , '#comment-down' , function(){
        $(this).parent().parent().parent().next().slideDown( "slow" );

        var id = $(this).attr('post-id');
        var route = $(this).attr('route');

        $.ajax({
            url : route,
            data : {post_id:id},
            success: function(a){
                $('.comment_loading_area').after(a);
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
});

