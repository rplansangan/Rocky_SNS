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
				type :  $(this).attr('method'),
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
    
    $(document).on('click', '#comment-del',function(e) {
    	var cid = $(this).attr('cid');
    	var pid = $(this).attr('pid');
    	var puid = $(this).attr('puid');
    	$.ajax({
    		url: $('#nf-del').val(),
    		data: { cid:cid, pid:pid, puid:puid, _token:$(this).attr('token') },
    		type: 'post',
    		success:function() {
    			$('li#comment-'+cid).remove();
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

	//send message
	$('#sendmsgModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var recipient = button.data('recipient')

		var modal = $(this)
		modal.find('.modal-title').text('New message to ' + recipient)
		modal.find('.modal-body input').val(recipient)
	});

	$('#sendmsgfile').click(function(){ $('#filephotouploader').trigger('click'); });

	$(document).on('keypress', '.comment-box' ,function (e) {
		var key = e.which;
		//if (event.shiftKey && event.keyCode == 13) {
			//var content = this.value;
			//var caret = getCaret(this);
			//this.value = content.substring(0, caret) + "<br>" + content.substring(caret, content.length - 1);
			//event.stopPropagation();
		//}
		if(key == 13){
			var url = $(this).attr('href');
			var id = $(this).attr('post_id');
			var puid = $(this).attr('puid');
			var token = $(this).attr('_token');
			var message = $(this).val();
			var a = this;
			if(message.length != 0){
				$.ajax({
					url : url,
					type : 'post',
					data: { id:id , _token:token , message:message, puid:puid },
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
		var uid = $(this).attr('puid');
		var a = this;
		$.ajax({
			url : url,
			type : 'post',
			data: {id:id , _token:token, uid:uid},
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

	$('#form-modal').on('submit' , function(e){
		var data = $(this).serialize()+"&message="+tinyMCE.activeEditor.getContent();
		var url = $(this).attr('action');
		$.post(url , data , function(a){
			alert('Thank you');
			$('#shopModal').modal('hide');
		});
		e.preventDefault();
	});
	$( ".datepicker" ).datepicker();
	$( ".datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

	//add pets
	$(document).on('change', '.ident_marks', function(){
		$('.add-pet-file-div').append("<input type='file' name='identifying_marks[]' class='ident_marks col-sm-6' > <input type='text' name='identifying_marks_desc[]' class='col-sm-6' placeholder='Identifying Mark Description' />");
	});
});






