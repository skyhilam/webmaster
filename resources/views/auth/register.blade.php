@extends('layouts.admin')

@section('content')

<form action="/register" method="post">
	<h1>User register</h1>
	{{csrf_field()}}
	<div>
		<label for="name"><b>Name</b></label>
		<input type="text" name="name" id="name" value="{{old('name')}}">
	</div>

	<div>
		<label for="email"><b>Email</b></label>
		<input type="email" name="email" id="email" value="{{old('email')}}">
	</div>

	<div>
		<label for="password"><b>Password</b></label>
		<input type="password" name="password" id="password">
	</div>

	<div>
		<label for="password-confirmed"><b>Confirm password</b></label>
		<input type="password" name="password_confirmation" id="password-confirmed">
	</div>

	<div>
		<button class="button expanded" type="submit">Register</button>
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
@endsection