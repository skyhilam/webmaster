@extends('layouts.admin')


@section('content')

<div class="row">
	<div class="columns medium-8 medium-centered">
		<br>
		
		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif

		<h3>{{trans('layout.setting')}}</h3>
		<hr>
		<table>
			<tr>
				<td colspan="3"><b>{{trans('layout.personal_setting')}}</b></td>
			</tr>
			<tr>
				<td>{{trans('layout.role')}}</td>
				<td colspan="2">{{trans('layout.'.$user->role->slug)}}</td>
			</tr>
			<tr>
				<td>{{trans('layout.email')}}</td>
				<td colspan="2">{{$user->email}}</td>
			</tr>
			<tr>
				<td width="100">{{trans('layout.name')}}</td>
				<td>{{$name = $user->name}}</td>
				<td width="80" class="text-center"><a href="{{url('/setting/name/'. $name)}}">{{trans('layout.edit')}}</a></td>
			</tr>
			<tr>
				<td>{{trans('layout.password')}}</td>
				<td>********</td>
				<td width="80" class="text-center"><a href="{{url('/setting/password')}}">{{trans('layout.edit')}}</a></td>
			</tr>
			<tr>
				<td colspan="3" class="text-center"><a href="{{url('/logout')}}">{{trans('layout.logout')}}</a></td>
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
		
	</div>
</div>

@endsection