@extends('layouts.login')


@section('content')
<br>
<br>
<br>
<br>
<div class="row">
	<div class="column medium-4 medium-centered">
		<div class="callout">
			<form action="{{url('/password/reset')}}" method="post">

				{{csrf_field()}}
				<input type="hidden" name="token" value="{{$token}}">

				<div>
					<label for="email"><b>Email</b></label>
					<input type="email" name="email" id="email" placeholder="Enter your email" autofocus="" value="{{old('email')}}">
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
					<button type="submit" class="button expanded">Reset new password</button>
				</div>
			</form>
		</div>

		@if (count($errors) > 0)
		    <div class="alert callout">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif
		
	</div>
</div>


@endsection