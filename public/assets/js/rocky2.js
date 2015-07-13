$(document).on('ready' , function(){
	$.ajaxSetup({
		data: { "_token": $('#token').val() },
		type: "POST"
	});
	$('[data-toggle="tooltip"]').tooltip();

	$('.modal').on('shown.bs.modal', function () {
	  $('.loader').text(' ');
	})
	 function validateEmail($email) {
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  return emailReg.test( $email );
	}
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
					location.reload();
				}else{
					$('.loader').text(a);
				}
			}
		});
		e.preventDefault();
	});

	$(document).on('submit' , '.form-signup' , function(e){
		var route = $(this).attr('action');
		var data = $(this).serialize();
		if($('#password').val().length < 8){
			$('.loader').hide().text('Minimum of 8 Characters').fadeIn();
		}else{
			$.ajax({
				type: $(this).attr('method'),
				url: route,
				data: data,
				beforeSend: function(){
					$('.loader').hide().text('Loading...').fadeIn();
				},
				success: function(a){
					if(a != 'ok'){
						$('.loader').hide().text('Your email address is already Taken').fadeIn();
					}else{
						$('#signupModal').modal('hide');
						window.location.href = url+"home";
					}
				}
			});
		}
		e.preventDefault();
	});

	//add pets
	$(".add-pets-btn").on("click", function() {
	    $('#addpetModal').modal('show');
	});

	$(document).on('focusout' , '#email_address' , function(){
		var route = $(this).attr('route');
		var email = $(this).val();
		var a = $(this)
		if(email.length == 0){
			
		}else if(!validateEmail(email)) {
			$(a).parent().removeClass('has-success');
			$(a).next().removeClass('glyphicon-ok');
			$(a).parent().addClass('has-error');
			$(a).next().addClass('glyphicon-remove');
		}else{
			$.ajax({
				type: $(this).attr('method'),
				url: route,
				data: { 'email' : email },
				success: function(response){
					if(response == 'ok'){
						$(a).parent().addClass('has-success');
						$(a).next().addClass('glyphicon-ok');
						$(a).parent().removeClass('has-error');
						$(a).next().removeClass('glyphicon-remove');
					}else{
						$(a).parent().removeClass('has-success');
						$(a).next().removeClass('glyphicon-ok');
						$(a).parent().addClass('has-error');
						$(a).next().addClass('glyphicon-remove');
					}
				}
			});
		}

	});

	$(document).on('focusout' , '#email_address_confirmation' , function(){
		var email_first = $('#email_address').val();
		if($(this).val().length != 0){
			if($(this).val() != email_first){
				$(this).parent().addClass('has-error');
				$(this).next().addClass('glyphicon-remove');
			}else{
				$(this).parent().removeClass('has-error');
				$(this).next().removeClass('glyphicon-remove');
			}
		}
	});

	$(document).on('focusout' , '#password' , function(){
		count = $(this).val().length;
		if(count < 8 && count != 0){
			$(this).parent().addClass('has-error');
			$(this).next().addClass('glyphicon-remove');
		}else{
			$(this).parent().removeClass('has-error');
			$(this).next().removeClass('glyphicon-remove');
		}
	});
});
