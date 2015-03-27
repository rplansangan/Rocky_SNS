<script>
$(document).ready(function(){
				$('.comment-box').keypress(function (e) {
					var key = e.which;
					if(key == 13) 
					{
						var url = $(this).attr('href');
						var id = $(this).attr('post_id');
						var token = $(this).attr('_token');
						var message = $(this).val();
						var a = this;
						if(message != ""){
							$.ajax({
								url : url,
								type : 'post',
								data: { id:id , _token:token , message:message },
								success: function(r){
									$(a).val('');
									$(a).text('');
									$(a).next().append(r);
								}
							});
						}
					}
				});
				$(".comment-box" ).elastic();
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
				$('.comment-form').on('click' , function(){
					$(this).next().fadeIn();
				});
			});
</script>