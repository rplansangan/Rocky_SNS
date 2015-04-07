<script>
$(document).ready(function(){
	$('.comment-form-hidden').hide();
	$('.append-post').find('script').remove();
	$('.comment-box').keypress(function (e) {
		var key = e.which;
		if(key == 13) 
		{
			var url = $(this).attr('href');
			var id = $(this).attr('post_id');
			var token = $(this).attr('_token');
			var message = $(this).val();
			var a = this;
			if(message.length != 0){
				$.ajax({
					url : url,
					type : 'post',
					data: { id:id , _token:token , message:message },
					success: function(r){
						$(a).val('');
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
		var url2 = $(this).attr('value4');
		var token = $(this).attr('value3');
		var a = this;
		$.ajax({
			url : url,
			type : 'post',
			data: {id:id , _token:token},
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
	$('.comment-form').on('click' , function(){
		$(this).next().fadeIn();
	});
});
</script>
@foreach($newsfeed as $single)
	@include('ajax.post', array(
		'user' => $single->user, 
		'message' => $single, 
		'image' => $single->image, 
		'like' => $single->like, 
		'comments' => $single->comment,
		'include_script' => false
	))
@endforeach