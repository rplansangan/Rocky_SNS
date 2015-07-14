$(document).ready(function(){
	$(document).on('click' , '#addMediaBtn' , function(){
		$( "#fileMedia" ).trigger( "click" );
	});

	var bar = $('.progress');
    var percent = $('.percent');
    var status = $('#status');

    $('#form12').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            alert(xhr.responseText);
        }
    });

    $(document).on('click' , '#comment-down' , function(){
        $(this).parent().parent().parent().next().slideDown( "slow" );
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

