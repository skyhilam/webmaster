@extends('layouts.admin.create_form', ['breadcrumb' => 'members/create'])

@section('form')
	
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


	@include('admin.inputs.input', 
		['id' => 'name', 'label' => 'name', 'name' => 'name', 'type' => 'text'])

	@include('admin.inputs.input', 
		['id' => 'email', 'label' => 'email', 'name' => 'email', 'type' => 'email'])

	@include('admin.inputs.input', 
		['id' => 'password', 'label' => 'password', 'name' => 'password', 'type' => 'password', 'value' => ''])

	@include('admin.inputs.input', 
		['id' => 'password_confirmation', 'label' => 'confirm_password', 'name' => 'password_confirmation', 'type' => 'password', 'value' => ''])

@endsection
