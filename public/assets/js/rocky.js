$(document).on('ready' , function(){
	$.ajaxSetup({
	  data: { "_token": $('#token').val() },
	  type: "POST"
	});

	$(document).on('click' , '#send' , function(e){
		$.ajax({
			type: "GET",
			url: $(this).attr('href'),
			data: {'other' : 'ok'},
			success: function(a){
				alert(a);
			}
		});
		e.preventDefault();
	});

});

	