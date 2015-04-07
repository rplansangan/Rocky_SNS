$(document).ready(function(){
	$('.custom-file-input').on('change' , function(event){

		if(this.files[0].size <= 3145728){
			var tmppath = URL.createObjectURL(event.target.files[0]);
			$('.view-image-here').html("<img src="+tmppath+" class='img-responsive img-thumbnail'>");
		}else{
			alert("The Image is Larger than 3MB");
			$(".custom-file-input").replaceWith($(".custom-file-input").clone());
		}
	});

	$('#post_message').focusout(function(){
		var l = $(this).val();
		if(l == ""){
			$('.hide_submit').fadeOut();
		}
	});
	$('#post_message').focus(function(){
		$('.hide_submit').hide().fadeIn().show();
	});

	$('#form-post').on('submit',function(e){
		$('.append-post').find('script').remove();
		data = new FormData($('#form-post')[0]);
		if($('#post_message').val() != "" ){
			$.ajax({
				url : $(this).attr('action'),
				type : 'post',
				data: data,
				processData: false,
				contentType: false,
				success: function(r){
					$(r).hide().fadeIn().insertBefore('.append-post > li:first-child');
					$('#form-post')[0].reset()
				}
			});
		}
		return false;
		e.preventDefault();
	});
	
	$('#OpenImgUpload').click(function(){ $('#fileuploader').trigger('click'); });

	

	$('.comment-form-hidden').hide();

	alreadyloading = false;
    $(window).scroll(function() {
        if ($('body').height() <= ($(window).height() + $(window).scrollTop())) {
            if (alreadyloading == false) {
            	alreadyloading = true;
                var items = $("#home-newsfeed > li").length;
                var route = $('#route-newsfeed-refresh').val();
                var token = $('#route-newsfeed-refresh').attr('_token');
                $.ajax({
    				url : route,
    				type : 'post',
    				data: { offset:items , _token:token},
    				 beforeSend: function() {
				        $("#load-here").html('loading');
				    },
    				success: function(r){
    					$('#home-newsfeed').append(r);
    					alreadyloading = false;
    				}
    			});
            }
        }
    });
    
    $('#btn_add_friend').on('click', function(e) {
    	$.ajax({
    		url: $(this).attr('href'),
    		data: { 
    				requested_id:$('#profile_id').val(),
    				_token:$(this).attr('_token'),
    				action:$(this).attr('data-act')
    		},
    		type: 'post',
    		success:function(r){ 
    			var r = jQuery.parseJSON(r);
    			
    			$('#btn_add_friend').text(r.message);
    			$('#btn_add_friend').attr('data-act', r.action);
    			
    		}
    	});
    	e.preventDefault();
    });
});






