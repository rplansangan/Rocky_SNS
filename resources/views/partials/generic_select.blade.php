<select name="{{{ $formName }}}" class="form-control">
@foreach($items as $key)
	<option value="{{{ $key['id'] }}}">{{{ $key['label'] }}}</option>
@endforeach
</select>