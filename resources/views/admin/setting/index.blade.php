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
		<td width="150" class="text-center">{{trans('layout.role')}}</td>
		<td colspan="2">{{trans('layout.'.$user->role->slug)}}</td>
	</tr>
	<tr>
		<td class="text-center">{{trans('layout.email')}}</td>
		<td colspan="2">{{$user->email}}</td>
	</tr>
	<tr>
		<td class="text-center">{{trans('layout.name')}}</td>
		<td>{{$name = $user->name}}</td>
		<td width="80" class="text-center"><a href="{{url('/setting/name')}}">{{trans('layout.edit')}}</a></td>
	</tr>
	<tr>
		<td class="text-center">{{trans('layout.password')}}</td>
		<td>****************</td>
		<td width="80" class="text-center"><a href="{{url('/setting/password')}}">{{trans('layout.edit')}}</a></td>
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