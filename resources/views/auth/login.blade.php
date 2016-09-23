@extends('layouts.login')

@section('content')
<br><br><br><br>
<div class="row">
	<div class="column medium-4 medium-centered">
		<div class="callout">
			<h1>{{trans('layout.login')}}</h1>
			<form action="{{url('/login')}}" method="post">
				{{csrf_field()}}
				<div>
					<label for="email"><b>{{trans('layout.email')}}</b></label>
					<input type="email" name="email" id="email" autofocus="" value="{{old('email')}}">
				</div>
				<div>
					<label for="password"><b>{{trans('layout.password')}}</b></label>
					<input type="password" name="password" id="password">
				</div>
				<div>
					<label >
						<input type="checkbox" name="remember">
						{{trans('layout.remember')}}
					</label>
				</div>
				<div>
					<button type="submit" class="button expanded">{{trans('layout.login')}}</button>
					<a href="{{url('/password/forgot')}}">{{trans('layout.forgot_password')}}</a>
				</div>
			</form>
		</div>
		<br>
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
