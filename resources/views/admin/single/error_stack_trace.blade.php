@extends('admin.master')

@section('content')
    <table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>{{ $error->id }}</th>
			</tr>
		</thead>
        <tbody>
			<tr>
			 <td>from user</td>
			 <td>{{ $error->from_user }}</td>
			</tr>
			<tr>
		      <td>error code</td>
		      <td>@if($error->error_code != (0 OR NULL)) {{ $error->error_code }} @else NULL @endif</td>
			</tr>
            <tr>
		      <td>error message</td>
		      <td>{{ $error->error_msg }}</td>
			</tr>
			<tr>
			 <td>route name</td>
			 <td>{{ $error->route_name }}</td>
			</tr>
			<tr>
			 <td>stack trace</td>
			 <td>
			     <textarea style="width:100%;min-height:160px;">{{ $error->stack_trace }}</textarea>
		      </td>
			</tr>
			<tr>
			 <td>created at</td>
			 <td>{{ $error->created_at }}</td>
			</tr>
		</tbody>
	</table>
@stop