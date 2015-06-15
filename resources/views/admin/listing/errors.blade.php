@extends('admin.master')

@section('content')
@if(!is_null($list))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>from user</th>
				<th>error message</th>
				<th>route name</th>
				<th>created at</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($list as $single)
			<tr>
				<td>{{ $single->id }}</td>
				<td>{{ $single->from_user }}</td>
				<td>{{ $single->error_msg }}</td>
				<td>{{ $single->route_name }}</td>
				<td>{{ $single->created_at }}</td>
				<td>
				    <a href="{{ route('admin.single.error', $single->id) }}">view stack trace</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $list->render() !!}
@else
	
@endif
@stop