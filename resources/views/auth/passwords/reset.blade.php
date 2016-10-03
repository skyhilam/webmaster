@extends('layouts.login')


@section('content')
<div class="flex-center">
	<section class="box">
		
		<div class="box-header">

			<h3 class="text-center">
				{{trans('layout.reset_password')}}
			</h3>

		</div>

		<div class="box-container">
			
			<form action="{{url('/password/reset')}}" method="post">

				{{csrf_field()}}
				<input type="hidden" name="token" value="{{$token}}">
				
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
					<label for="password-confirmed" class="text-center purple">{{trans('layout.confirm_password')}}</label>
					<input type="password" name="password_confirmation" id="password-confirmed">
				</div>
	
				<div class="text-center">
					<br>
					<button type="submit" class="button">{{trans('layout.reset_password')}}</button>
				</div>
			</form>
			
		</div>
			
	</section>
</div>


@endsection