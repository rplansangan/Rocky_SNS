$( document ).ready(function() {

	//signup form validation
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
});

////signup form validation for password
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
