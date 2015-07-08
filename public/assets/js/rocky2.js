$(document).on('ready' , function(){
	$.ajaxSetup({
		  data: { "_token": $('#token').val() },
		  type: "POST"
		});

	$('.form-signin').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
});