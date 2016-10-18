@extends('layouts.admin.info_form', ['breadcrumb' => 'setting', 'logout' => true])


@section("form")
	
	<tr>
		<td width="150" class="text-center"><p >{{trans('layout.role')}}</p></td>
		<td ><p>{{trans('layout.'.$user->role->slug)}}</p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.email')}}</p></td>
		<td ><p>{{$user->email}}</p></td>
	</tr>

	@include('admin.table.tr', ['label' => trans('layout.name'), 'value' => $user->name, 'url' => '/setting/name'])

	@include('admin.table.tr', ['label' => trans('layout.password'), 'value' => '****************', 'url' => '/setting/password'])



@endsection