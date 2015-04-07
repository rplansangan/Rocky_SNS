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
		var id = $('#profile_id').val();
		var url = $(this).attr('href');
		var token = $(this).attr('_token');
		$.ajax({
			url: url,
			type: 'post',
			data: { requested_id:id, _token:token },
			success: function(response) {
				$('#btn_add_friend').text(response);
			}
		});
		e.preventDefault();
	});

	//individual
	$('.useraddform').hide();
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
});






