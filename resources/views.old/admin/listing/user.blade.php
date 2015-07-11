@extends('admin.master')

@section('content')
@if(!is_null($list))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>email address</th>
				<th>first name</th>
				<th>last name</th>
				<th>user role</th>
				<th>deactivated</th>
				<th>validated</th>
				<th>created at</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($list as $single)
			<tr>
				<td>{{ $single->user_id }}</td>
				<td>{{ $single->email_address }}</td>
				<td>{{ $single->registration->first_name }}</td>
				<td>{{ $single->registration->last_name }}</td>
				<td>{{ $single->user_role }}</td>
				<td>{{ $single->is_deactivated }}</td>
				<td>{{ $single->is_validated }}</td>
				<td>{{ $single->created_at }}</td>
				<td><a href="{{ route('admin.list.user.data', $single->user_id) }}">Manage User</a>
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $list->render() !!}
@else
	
@endif
@stop