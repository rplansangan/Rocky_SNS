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

	$('.hide_submit').hide();
	$('#post_message').focusout(function(){
		var l = $(this).val();
		if(l == ""){
			$('.hide_submit').fadeOut();
		}
	});
	$('#post_message').focus(function(){
		$('.hide_submit').hide().fadeIn().show();
	});
});