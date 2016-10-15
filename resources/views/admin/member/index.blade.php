@extends('layouts.admin.index_form', ['breadcrumb' => 'members', 'row' => true])


@section('form')

<table class="box">
	<thead>
		<tr>
			<th ><p>{{trans('layout.name')}}</p></th>
			<th width="150"><p class="text-center">{{trans('layout.role')}}</p></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td><a href="{{$url =url('/members/info/'. $user->public_id)}}"><p>{{str_limit($user->name, 10)}}</p></a></td>
			<td ><a href="{{$url =url('/members/info/'. $user->public_id)}}"><p class="text-center">{{trans('layout.'.$user->role->slug)}}</p></a></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="2"><a href="{{url('members/create')}}"><p>{{trans('layout.create')}}</p></a></td>
		</tr>
	</tbody>
</table>

@endsection







