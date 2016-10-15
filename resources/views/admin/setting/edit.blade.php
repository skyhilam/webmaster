@extends('layouts.admin.edit_form', ['breadcrumb' => 'setting/edit'])

@section('form')

	@if($param == 'password')
		<tr>
			<td width="150" class="text-center">
				<label for="{{$param}}">{{trans('layout.'.$param)}}</label>
			</td>

			<td>
				
				<input type="password" name="password" id="password" placeholder="{{trans('layout.enter_new_password')}}" autofocus>
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
			</td>

			
		</tr>
	@else

		@include('admin.inputs.input', ['id' => $param, 'label' => $param, 'name' => $param, 'type' => 'text', 'autofocus' => 'autofocus', 'value' => $user->$param])
		
	@endif

@endsection

