@extends('layouts.admin.edit_form', ['breadcrumb' => 'members/edit', 'item' => $user])

@section('form')

@if($param == 'role')
<tr>
	<td width="150" class="text-center">
		<label for="role">{{trans('layout.role')}}</label>
	</td>
	<td>
		<select name="role" id="role">
			@foreach($roles as $role)
			<option value="{{$role->id}}" {{$role->id == $user->role_id? 'selected': ''}}>
				{{trans('layout.'. $role->slug)}}
			</option>
			@endforeach
		</select>
	</td>
</tr>
@elseif($param == 'password')

<tr>
	<td width="150" class="text-center">
		<label for="password">{{trans('layout.password')}}</label>
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
		<label for="password-confirmed">{{trans('layout.confirm_password')}}</label>
	</td>

	<td>
		<input type="password" name="password_confirmation" id="password-confirmed" placeholder="{{trans('layout.enter_new_password_confirmation')}}">
	</td>
</tr>


@else

@include('admin.inputs.input', ['id' => $param, 'label' => $param, 'name' => $param, 'type' => 'text', 'autofocus' => 'autofocus', 'value' => $user->$param])

@endif


@endsection
