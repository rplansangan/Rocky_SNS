@extends('admin.master')

@section('content')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Laravel Version:</th>
			<th>{{ $stats['app_ver'] }}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>User count:</td>
			<td>
				<a href="{{ route('admin.list.user') }}">{{ $stats['users'] }}</a>
			</td>
		</tr>
		<tr>
			<td>Post count:</td>
			<td>{{ $stats['posts'] }}</td>
		</tr>
		<tr>
			<td>Photo/video count:</td>
			<td>{{ $stats['photos'] }}</td>
		</tr>
		<tr>
			<td>Comment count:</td>
			<td>{{ $stats['comments'] }}</td>
		</tr>
		<tr>
			<td>Like counnt:</td>
			<td>{{ $stats['likes'] }}</td>
		</tr>
		<tr>
			<td>Pet count:</td>
			<td>{{ $stats['pets'] }}</td>
		</tr>
		<tr>
			<td>Pet Foundation count:</td>
			<td>{{ $stats['pet_foundations'] }}</td>
		</tr>
	</tbody>
</table>
@stop