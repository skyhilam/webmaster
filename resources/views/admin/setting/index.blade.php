@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('setting') !!}

@if (session('status'))
    <div class="success callout">
        {{ session('status') }}
    </div>
@endif

<table class="box">
	<tr>
		<td width="150" class="text-center"><p >{{trans('layout.role')}}</p></td>
		<td colspan="2"><p>{{trans('layout.'.$user->role->slug)}}</p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.email')}}</p></td>
		<td colspan="2"><p>{{$user->email}}</p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.name')}}</p></td>
		<td><p>{{$name = $user->name}}</p></td>
		<td width="80" class="text-center"><p><a href="{{url('/setting/name')}}">{{trans('layout.edit')}}</a></p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.password')}}</p></td>
		<td><p>****************</p></td>
		<td width="80" class="text-center"><p><a href="{{url('/setting/password')}}">{{trans('layout.edit')}}</a></p></td>
	</tr>
	<!-- <tr>
		<td colspan="3"><b>{{trans('layout.company_setting')}}</b></td>
	</tr>
	<tr>
		<td>{{trans('layout.address')}}</td>	
		<td ></td>
		<td width="80" class="text-center"><a href="{{url('setting/company/address')}}">{{trans('layout.edit')}}</a></td>
	</tr>
	<tr>
		<td>{{trans('layout.tel')}}</td>
		<td ></td>
		<td width="80" class="text-center"><a href="{{url('setting/company/tel')}}">{{trans('layout.edit')}}</a></td>
	</tr>
	<tr>
		<td>{{trans('layout.email')}}</td>
		<td ></td>
		<td width="80" class="text-center"><a href="{{url('setting/company/email')}}">{{trans('layout.edit')}}</a></td>
	</tr> -->
</table>
<br>
<div class="text-center">
	<a class="button box" href="{{url('/logout')}}">{{trans('layout.logout')}}</a>
</div>
@endpush
@include('admin.console_container')


@endsection