<form method="post" action="{{ route('test.upload') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="message">
	<input type="file" name="file">
	<input type="submit">
</form>