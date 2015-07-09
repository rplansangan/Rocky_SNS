$(document).on('ready' , function(){
	var url = "http://localhost:8000/";
	var sliderBx;
	window.onedir = 'next';

	sliderBx = $('#slider1').bxSlider({
		auto: true,
		autoControls: true,
		autoControlsSelector: '#my-start-stop',
		slideWidth: 1160,
		speed: 700,
		autoStart: false
	});

	$('.bx-next').click(function() {
		window.onedir = 'next';
		sliderBx.startShow();           
	});

	$('.bx-prev').click(function() {
		window.onedir = 'prev';
		sliderBx.startShow();     
	});

	$.ajaxSetup({
		data: { "_token": $('#token').val() },
		type: "POST"
	});

	$(document).on('submit' , '.form-signin' , function(e){
		var route = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			type: $(this).attr('method'),
			url: route,
			data: data,
			beforeSend: function(){
				$('.loader').hide().text('Loading...').fadeIn();
			},
			success: function(a){
				if(a == 'success'){
					$('#loginModal').modal('hide');
					window.location.href = url+"home";

				}else{
					$('.loader').text(a);
				}
			}
		});
		e.preventDefault();
	});
});