@extends('layouts.login')

@section('content')
<div class="flex-center">
	<section class="box">
		
		<div class="box-header">

			<h3 class="text-center">
				{{config('app.name')}} <br>
				{{trans('layout.webmaster')}}
			</h3>

		</div>

		<div class="box-container">
			
			<form action="{{url('/login')}}" method="post">
				{{csrf_field()}}
				<div>
					<label for="email" class="text-center purple">{{trans('layout.email')}}</label>
					<input type="email" name="email" id="email" autofocus="" value="{{old('email')}}">
					@if($errors->has('email'))
					<span class="form-error is-visible">* {{$errors->first('email')}}</span>
					@endif
				</div>

				<div>
					<label for="password" class="text-center purple">{{trans('layout.password')}}</label>
					<input type="password" name="password" id="password">
					@if($errors->has('password'))
					<span class="form-error is-visible">* {{$errors->first('password')}}</span>
					@endif
				</div>

				<div>
					<label class="text-center">
						<input type="checkbox" name="remember">
						{{trans('layout.remember')}}
					</label>
				</div>
				<div class="text-center">
					<br>
					<button type="submit" class="button">{{trans('layout.login')}}</button> 
					<br><br>
					<a href="{{url('/password/forgot')}}">{{trans('layout.forgot_password')}}</a>
				</div>
				
			</form>
			
		</div>
			
	</section>
</div>




@endsection
