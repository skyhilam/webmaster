@extends('layouts.admin')

@section('content')

<table>
	<thead>
		<tr>
			<th width="100">Name</th>
			<th width="100">Email</th>
			<th>Content</th>
			<th>Seen</th>
			<th width="150">Created at</th>
		</tr>
	</thead>

	<tbody>
		@foreach($messages as $msg)
		<tr>
			<th>{{$msg->name}}</th>
			<th>{{$msg->email}}</th>
			<th class="text-left">{{$msg->content}}</th>
			<th>{{$msg->seen}}</th>
			<th>{{$msg->created_at}}</th>
		</tr>
		@endforeach
	</tbody>
</table>
{{$messages->links()}}

@endsection