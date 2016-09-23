@extends('layouts.admin')


@section('content')

@if (count($errors) > 0)
    <div class="alert callout">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<br>

<div class="row">
	<div class="columns medium-centered medium-8">
		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif

		<h3>{{trans('layout.personal')}}</h3>
		<form action="{{$url = url('/member/edit/'.$user->public_id)}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			
			<div>
				<label for="email">{{trans('layout.email')}}</label>
				<input type="email" name="email" id="email" value="{{$user->email}}" disabled="">
			</div>

			<div>
				<label for="role">{{trans('layout.role')}}</label>
				<select name="role" id="role">
					@foreach($roles as $role)
					<option value="{{$role->id}}" {{$role->id == $user->role_id? 'selected': ''}}>
						{{trans('layout.'. $role->slug)}}
					</option>
					@endforeach
				</select>
			</div>
			<div>
				<label for="name">{{trans('layout.name')}}</label>
				<input type="text" name="name" id="name" value="{{$user->name}}">
			</div>

			

			<div>
				<button class="button expanded" type="submit">{{trans('layout.edit')}}</button>
			</div>
		</form>
		<br>

		<h3>{{trans('layout.password')}}</h3>
		<form action="{{$url}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">

			<div>
				<label for="password"><b>{{trans('layout.password')}}</b></label>
				<input type="password" name="password" id="password">
			</div>

			<div>
				<label for="password-confirmed"><b>{{trans('layout.confirm_new_password')}}</b></label>
				<input type="password" name="password_confirmation" id="password-confirmed">
			</div>

			<div>
				<button class="button expanded" type="submit">{{trans('layout.edit')}}</button>
			</div>
		</form>
	</div>
</div>



@endsection