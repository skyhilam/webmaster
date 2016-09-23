@extends('layouts.admin')


@section('content')
<br>
<div class="row ">
	<div class="columns medium-8 medium-centered">
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.create_new_member'), 'render' => 'member/create'])
		<form action="{{request()->url()}}" method="post">

			{{csrf_field()}}
			<div>
				<label for="role">{{trans('layout.role')}}</label>
				<select name="role" id="role">
					@foreach($roles as $role)
					<option value="{{$role->id}}">{{$role->title}}</option>
					@endforeach
				</select>
			</div>
			<div>
				<label for="name">{{trans('layout.name')}}</label>
				<input type="text" name="name" id="name" value="{{old('name')}}">
			</div>

			<div>
				<label for="email">{{trans('layout.email')}}</label>
				<input type="email" name="email" id="email" value="{{old('email')}}">
			</div>

			<div>
				<label for="password">{{trans('layout.password')}}</label>
				<input type="password" name="password" id="password">
			</div>

			<div>
				<label for="password-confirmed">{{trans('layout.confirm_password')}}</label>
				<input type="password" name="password_confirmation" id="password-confirmed">
			</div>

			<div>
				<button class="button expanded" type="submit">{{trans('layout.create_new')}}</button>
			</div>
		</form>

		@if (count($errors) > 0)
		    <div class="alert callout">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
</div>


@endsection