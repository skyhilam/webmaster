@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('member/edit', $user) !!}

<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="patch">
<table class="box">
	@if($param != 'password')
	<tr>
		<td width="150" class="text-center">
			<label for="{{$param}}">{{trans('layout.'.$param)}}</label>
		</td>
		<td>
			
			@if($param == 'role')
			<select name="role" id="role">
				@foreach($roles as $role)
				<option value="{{$role->id}}" {{$role->id == $user->role_id? 'selected': ''}}>
					{{trans('layout.'. $role->slug)}}
				</option>
				@endforeach
			</select>
			@if($errors->has('role'))<span class="form-error is-visible">* {{$errors->first('role')}}</span>@endif

			@else
			<div>
				<input type="text" name="{{$param}}" id="{{$param}}" value="{{$user->$param}}">
				@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif
			</div>
			
			@endif
			<br>
			<br>

		</td>
	</tr>
	@else
	<tr>
		<td width="150" class="text-center">
			<label for="{{$param}}">{{trans('layout.'.$param)}}</label>
		</td>

		<td>
			
			<input type="password" name="password" id="password" placeholder="{{trans('layout.enter_new_password')}}">
			@if($errors->has('password'))
			<span class="form-error is-visible">* {{$errors->first('password')}}</span>
			@endif


		</td>


	</tr>

	<tr>
		<td width="150" class="text-center">
			<label for="{{$param}}">{{trans('layout.confirm_password')}}</label>
		</td>

		<td>
			
			<input type="password" name="password_confirmation" id="password-confirmed" placeholder="{{trans('layout.enter_new_password_confirmation')}}">
			<br><br>
		</td>

		
	</tr>
	@endif
	
</table>
<br>
<div class="text-center">
	<button type="submit" class="button box">{{trans('layout.edit')}}</button>
</div>
</form>


@endpush
@include('admin.console_container')




@endsection