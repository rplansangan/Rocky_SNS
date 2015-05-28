$(document).ready(function(){
	tinymce.init({
	    selector: ".video-textarea , .primary-textarea",
	    toolbar: false,
	    menubar : false,
	    statusbar: false
	 });
		

	/*$('.company_background').html('<img src="http://4.bp.blogspot.com/-_qxynaNliS8/VSSqYpddauI/AAAAAAAABx8/Izb2vjAHHxo/s1600/170122.jpg">');
	*/
	$('.custom-file-input').on('change' , function(event){
		var ext = this.value.match(/\.(.+)$/)[1];
		if(this.files[0].size <= 3145728){
			switch (ext) {
		        case 'jpg':
		        case 'jpeg':
		        case 'png':
		        case 'gif':
		        case 'JPG':
		            var tmppath = URL.createObjectURL(event.target.files[0]);
			        $('.view-image-here').html("<img src="+tmppath+" class='img-responsive img-thumbnail'>");
		            break;
		        default:
		            alert('This is not an allowed file type.');
		    }
		}else{
			alert("The Image is Larger than 3MB");
			$(".custom-file-input").replaceWith($(".custom-file-input").clone());
			$('#category-select').addClass('hidden');
		}
	});
	$('.custom-file-input-video').on('change' , function(event){
		if(this.files[0].size == 0){
			$('#category-select').addClass('hidden');
		}
	});
	/*
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
		
	*/
	
	
	$('#OpenImgUpload').click(function(){ 
		$('#fileuploader').trigger('click'); 
		$('#video-title').attr('type' , 'hidden');
		$('#video-title').attr("value" , '');
		$('#category-select').removeClass('hidden');
	});
	$('#OpenVideoUpload').click(function(){
		 $('#fileuploaderVideo').trigger('click'); 
		 $('#video-title').attr('type' , 'text');
		 $('#category-select').removeClass('hidden');
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
    
    $(document).on('click', '.nf-post #post-del', function(e) {
    	var action = $(this).attr('data-act');
    	var pid = $(this).attr('data-pid');
    	var token = $(this).attr('token');
    	$.ajax({
    		url: $('.nf-post #del-route').val(),
    		data: { action:action, pid:pid, _token:token },
    		type: 'post',
    		success: function() {
    			$('.nf-post#post-'+pid).remove();
    		}
    	});
    	e.preventDefault();
    });
    
    $(document).on('click', '#comment-del',function(e) {
    	var action = $(this).attr('data-act');
    	var cid = $(this).attr('data-cid');
    	var pid = $(this).attr('data-pid');
    	var puid = $(this).attr('data-puid');
    	var token = $(this).attr('token');
    	$.ajax({
    		url: $('.nf-post #del-route').val(),
    		data: { action:action, cid:cid, pid:pid, puid:puid, _token:token },
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
		placement : 'left'
	});

	$('.signupvalpw').tooltip({
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
		//modal.find('.modal-body input').val(recipient)
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

	var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('#form-post').ajaxForm({
    	beforeSubmit: function(arr , $form , option){
    		arr.push({name:'message', value: tinyMCE.activeEditor.getContent() })
    	},
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
            $(xhr.responseText).hide().fadeIn().insertBefore('.append-post > li:first-child');
            $("#form-post").trigger('reset');
        },
        success: function(){
            percent.fadeOut();
            $('#video-title').attr('type' , 'hidden');
			$('#video-title').attr("value" , '');
        }
    });
    
     $('#video-post').ajaxForm({
    	beforeSubmit: function(arr , $form , option){
    		arr.push({name:'message', value: tinyMCE.activeEditor.getContent() })
    	},
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
            $(xhr.responseText).hide().fadeIn().insertBefore('.video-list > ul > li:first-child');
            $("#video-post").trigger('reset');
        },
        success: function(){
            percent.fadeOut();
        }
    });

    //Foundpets
	$(".land-found" ).elastic();
	$('.land-found').hide();
	$('.foundbtn').on('click', function(){
		$('.land-found').show();
		$('.land-mid-vid-btn').hide();
		$('.land-missing').hide();
	});

	//found pets with tag number modal
	$('#foundwtag').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)

		var modal = $(this)
		modal.find('.modal-title').text('I found a pet with tag number')
	});

	//found pets without tag modal
	$('.foundpet').on('click' , function(){
		$('#foundpet').modal('show');

		var modal = $('#foundpet')
		modal.find('.modal-title').text('I found a pet!')
	});

	$('#foundfile').click(function(){ $('#filephotouploader').trigger('click'); });

	//Missingpets
	$(".land-missing" ).elastic();
	$('.land-missing').hide();
	$('.missingbtn').on('click', function(){
		$('.land-missing').show();
		$('.land-mid-vid-btn').hide();
		$('.land-found').hide();
	});

	//rocky, find mypet modal
	$('.misspet').on('click' , function(e){
	var url = $('#user-check').val()+"/";
	var current = window.location.href;
		if(current == url){
			alert('Please log in first.');
		}
		else if(current != url) {
			$.ajax({
	    		url: $(this).attr('route'),
	    		data: { 
	    				_token:$(this).attr('token')
	    		},
	    		type: 'post',
	    		success:function(r){ 
	    			$('.loadhere').html(r);
	    			$('#misspet').modal('show');
	    			var modal = $('#misspet');
					modal.find('.modal-title').text('Let\'s Find Your Pet');
	    		}
	    	});
		}
	});

	//image carousel
	$("#ftpetsCarousel").carousel({
         interval : 6000,
         pause: false
     });

	$(document).on('keydown' , '.passlen' , function(){
		var count = $(this).val();
		if(count.length < 5){
			$(".divCheckPasswordLen").html('<i class="fa fa-exclamation"></i> minimum of 6 characters').css('color', '#AD0000');
		}
		else {
			$(".divCheckPasswordLen").html("");
		}
	});

	$(document).on('click' , '.tabclick' , function(){
		$(".divCheckPasswordMatch").html("");
		$('.divCheckEmail').html("");
	});

	 $(".txtConfirmPassword").keyup(checkPasswordMatch);
	 $(".txtConfirmPasswordtwo").keyup(checkPasswordMatchTwo);
	 $(".txtConfirmPasswordthr").keyup(checkPasswordMatchThr);
	 $(".txtConfirmPasswordfor").keyup(checkPasswordMatchFor);

	 $(document).on('change' , '.regemail1' , function(){

		$.ajax({
    		url: $('#checkemail').val(),
    		data: { 
    				email:$(this).val(),
    				_token:$(this).attr('token')
    		},
    		type: 'post',
    		success:function(r){ 
    			if(r == 1){
    				$('.divCheckEmail').html('<i class="fa fa-exclamation"></i> Email is already connected to another user').css('color', '#AD0000');
    			}else{
    				$('.divCheckEmail').html("");
    			}
    		}
    	});
	 });

	 $(document).on('click' , '.foundmodal' ,function(){
	 	var route = $(this).attr('route');
	 	var token = $(this).attr('token');
	 	var id = $(this).attr('tag-id');	    		
	    		$.ajax({
	    		url:route,
	    		data: { 
	    				id:id,
	    				_token:token
	    		},
	    		type: 'post',
	    		success:function(r){ 
	    			$('.loadmodalhere').html(r);
	    			$('#foundwtag').modal('show');
	    		}
	    	});
	 });
	 $('.tagbtn').on('click' , function(e){
	 	var id = $('.foundpettag').val();
	 	if(id.length != 0){
	 		$.ajax({
	    		url: $(this).attr('zia'),
	    		data: { 
	    				id:id,
	    				_token:$(this).attr('token')
	    		},
	    		type: 'post',
	    		success:function(r){ 
	    			$('.loadmodalhere').html(r);
	    			$('#foundwtag').modal('show');
	    		}
	    	});
	 	}else{
	 		alert('Please input pet tag number.');
	 	}
    	e.preventDefault();
	 }); 

	 $(document).on('submit' , '.lostpet' ,function(e){
	 	var data = $(this).serialize();
	 	var route = $(this).attr('action');
	 	var method = $(this).attr('method');
	 	$.ajax({
	 		url:route,
	 		data:data,
	 		type: method,
	 		success:function(r){ 
	 			alert(r);
	 		}
	 	});
	 	e.preventDefault();
	 });


});

	

function checkPasswordMatch() {

	var password = $(".txtNewPassword").val();
	var confirmPassword = $(".txtConfirmPassword").val();
	if (password != confirmPassword){
		$(".divCheckPasswordMatch").html('<i class="fa fa-times"></i> Oops! Passwords do not match!').css('color', '#AD0000');
	}else{
		$(".divCheckPasswordMatch").html('<i class="fa fa-check"></i> Passwords match.').css('color', '#067B02');
	}

}

function checkPasswordMatchTwo() {

	var password = $(".txtNewPasswordtwo").val();
	var confirmPassword = $(".txtConfirmPasswordtwo").val();
	if (password != confirmPassword){
		$(".divCheckPasswordMatch").html('<i class="fa fa-times"></i> Oops! Passwords do not match!').css('color', '#AD0000');
	}else{
		$(".divCheckPasswordMatch").html('<i class="fa fa-check"></i> Passwords match.').css('color', '#067B02');
	}

}

function checkPasswordMatchThr() {

	var password = $(".txtNewPasswordthr").val();
	var confirmPassword = $(".txtConfirmPasswordthr").val();
	if (password != confirmPassword){
		$(".divCheckPasswordMatch").html('<i class="fa fa-times"></i> Oops! Passwords do not match!').css('color', '#AD0000');
	}else{
		$(".divCheckPasswordMatch").html('<i class="fa fa-check"></i> Passwords match.').css('color', '#067B02');
	}

}

function checkPasswordMatchFor() {

	var password = $(".txtNewPasswordfor").val();
	var confirmPassword = $(".txtConfirmPasswordfor").val();
	if (password != confirmPassword){
		$(".divCheckPasswordMatch").html('<i class="fa fa-times"></i> Oops! Passwords do not match!').css('color', '#AD0000');
	}else{
		$(".divCheckPasswordMatch").html('<i class="fa fa-check"></i> Passwords match.').css('color', '#067B02');
	}

}





