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
		data = new FormData($('#form-post')[0]);
		if($('#post_message').val() != "" ){
			$.ajax({
				url : $(this).attr('action'),
				type : 'post',
				data: data,
				processData: false,
				contentType: false,
				success: function(r){
					$('.append-post').find('script').remove();
					$(r).hide().fadeIn().insertBefore('.append-post > li:first-child');
				}
			});
		}
		return false;
		e.preventDefault();
	});

	$('#form-post')[0].reset()
	$('#OpenImgUpload').click(function(){ $('#fileuploader').trigger('click'); });

	$('.comment-like').on('click' , function(e){
		var id = $(this).attr('value');
		var url = $(this).attr('value2');
		var token = $(this).attr('value3');
		var a = this;
		$.ajax({
			url : url,
			type : 'post',
			data: {id:id , _token:token},
			success: function(r){
				$(a).children('span').text(r);
			}
		});	
		e.preventDefault();
	});
});






