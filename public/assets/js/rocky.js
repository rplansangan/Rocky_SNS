$(document).ready(function(){
	tinymce.init({
	    selector: ".company_background",
		toolbar1: " insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    setup: function(editor) {
		        editor.addButton('mybutton', {
		            type: 'button',
		            text: 'Upload',
		            onclick: function(){
		            	editor.insertContent('<img src="http://4.bp.blogspot.com/-_qxynaNliS8/VSSqYpddauI/AAAAAAAABx8/Izb2vjAHHxo/s1600/170122.jpg">');
		            }
		        });
		    }
	 });
	tinymce.init({
	    selector: ".primary-textarea",
	    toolbar: false,
	    menubar : false,
	    statusbar: false
	 });
	/*$('.company_background').html('<img src="http://4.bp.blogspot.com/-_qxynaNliS8/VSSqYpddauI/AAAAAAAABx8/Izb2vjAHHxo/s1600/170122.jpg">');
	*/
	$('.custom-file-input').on('change' , function(event){
		if(this.files[0].size <= 3145728){
			var tmppath = URL.createObjectURL(event.target.files[0]);
			$('.view-image-here').html("<img src="+tmppath+" class='img-responsive img-thumbnail'>");
		}else{
			alert("The Image is Larger than 3MB");
			$(".custom-file-input").replaceWith($(".custom-file-input").clone());
		}
	});


	$('#form-post').on('submit',function(e){
		data = new FormData($('#form-post')[0]);
		data.append('message' , tinyMCE.activeEditor.getContent());
		if(tinyMCE.activeEditor.getContent() != "" ){
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
		e.preventDefault();
	});
	
	$('#OpenImgUpload').click(function(){ $('#fileuploader').trigger('click'); });


	alreadyloading = false;
    $(window).scroll(function() {
        if ($('body').height() <= ($(window).height() + $(window).scrollTop())) {
            if (alreadyloading == false) {
            	alreadyloading = true;
                var items = $("#home-newsfeed > li").length;
                var route = $('#route-newsfeed-refresh').val();
                var token = $('#route-newsfeed-refresh').attr('_token');
                var post_uid = $('#post_uid').val();
                $.ajax({
    				url : route,
    				type : 'post',
    				data: { offset:items , _token:token, post_uid:post_uid},
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
    			console.log(r);
    			$('#btn_add_friend').text(r.message);
    			$('#btn_add_friend').attr('data-act', r.action);
    			
    		}
    	});
    	e.preventDefault();
    });

	//individual
	$('.btn_indiv').addClass('active');
	$('.btn_indiv').on('click', function(){
		$('.useraddform').show();
		$('.merchform').hide();
	});

	$('.btn_usertype').on('click', function(){
		$('.btn_usertype').removeClass('active');
		$(this).addClass('active');
	});

	//merchant
	$('.merchform').hide();
	$('.btn_merch').on('click', function(){
		$('.useraddform').hide();
		$('.merchform').show();
	});

	$('[data-toggle="tooltip"]').tooltip({
		placement : 'top'
	});

	$('#shopModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var type = button.data('type');
		var advertisetype = button.data('advertisetype');
		var id = button.data('id');
		var title = button.data('title');
		var action = button.data('action');
		var modal = $(this);
		modal.find('.modal-type-form').text(type);
		modal.find('.modal-title').text(title);
		modal.find('form').attr('action' , action);
		modal.find('#modal-form-id').attr('value' , id);
		modal.find('#modal-form-type').attr('value' , advertisetype);
		modal.find('.modal-body input').val(type);
	});

	$(document).on('keypress', '.comment-box' ,function (e) {
		var key = e.which;
		if(key == 13) 
		{
			var url = $(this).attr('href');
			var id = $(this).attr('post_id');
			var token = $(this).attr('_token');
			var message = $(this).val();
			var a = this;
			if(message.length != 0){
				$.ajax({
					url : url,
					type : 'post',
					data: { id:id , _token:token , message:message },
					success: function(r){
						$(a).val('');
						$(a).next().append(r);
					}
				});
			}
		}
	});
	$(".comment-box" ).elastic();
	$('.comment-form-hidden').hide();
	$(document).on('click' , '.comment-like' ,function(e){
		var id = $(this).attr('value');
		var url = $(this).attr('value2');
		var url2 = $(this).attr('value4');
		var token = $(this).attr('value3');
		var a = this;
		$.ajax({
			url : url,
			type : 'post',
			data: {id:id , _token:token},
			success: function(r){
				var like = jQuery.parseJSON(r);
				if(like.liked){
					$(a).text('Unlike');
				}else{
					$(a).text('Like');
				}
				$(a).prev().prev().prev().text(like.count);
			}
		});

		e.preventDefault();
	});
	$(document).on('click' , '.comment-form-btn' , function(){
		var data_act = $(this).attr('isClick');
		if(data_act == 'Open'){
			$(this).attr('isClick' , 'Closed');
			$(this).next().fadeIn();
		}else{
			$(this).attr('isClick' , 'Open');
			$(this).next().fadeOut();
		}
	});

	$(document).on('click' , '#refresh-btn' , function(){
		location.reload();
	});

	$('#form-modal').on('submit' , function(e){
		var data = $(this).serialize()+"&message="+tinyMCE.activeEditor.getContent();
		var url = $(this).attr('action');
		$.post(url , data , function(a){
			alert('Thank you');
			$('#shopModal').modal('hide');
		});
		e.preventDefault();
	});
});






