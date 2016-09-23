@extends('layouts.admin')



@section('content')

<div class="row">
	<div class="column">
		<table>
			<thead>
				<tr>
					<th width="200">Title</th>
					<th>Slug</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td>{{$role->title}}</td>
					<td>{{$role->slug}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection