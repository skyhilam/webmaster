@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('member/create') !!}

<form action="{{request()->url()}}" method="post">
	{{csrf_field()}}
	<table class="box">
		<tr>
			<td class="text-center" width="150"><label for="role">{{trans('layout.role')}}</label></td>
			<td>
				<select name="role" id="role">
					@foreach($roles as $role)
					<option value="{{$role->id}}">{{$role->title}}</option>
					@endforeach
				</select>
				@if($errors->has('role'))<span class="form-error is-visible">* {{$errors->first('role')}}</span>@endif
			</td>
		</tr>
		<tr>
			<td class="text-center"><label for="name">{{trans('layout.name')}}</label></td>
			<td>
				<input type="text" name="name" id="name" value="{{old('name')}}">
				@if($errors->has('name'))<span class="form-error is-visible">* {{$errors->first('name')}}</span>@endif
			</td>
		</tr>
		<tr>
			<td class="text-center"><label for="email">{{trans('layout.email')}}</label></td>
			<td>
				<input type="email" name="email" id="email" value="{{old('email')}}">
				@if($errors->has('email'))<span class="form-error is-visible">* {{$errors->first('email')}}</span>@endif
			</td>
		</tr>
		<tr>
			<td class="text-center"><label for="password">{{trans('layout.password')}}</label></td>
			<td>
				<input type="password" name="password" id="password">
				@if($errors->has('password'))<span class="form-error is-visible">* {{$errors->first('password')}}</span>@endif
			</td>
		</tr>
		<tr>
			<td class="text-center"><label for="password-confirmed">{{trans('layout.confirm_password')}}</label></td>
			<td>
				<input type="password" name="password_confirmation" id="password-confirmed">
			</td>
		</tr>
	</table>
	<br>
	<div class="text-center">
		<button class="button box" type="submit">{{trans('layout.create_member')}}</button>
	</div>

</form>


@endpush
@include('admin.console_container')




@endsection