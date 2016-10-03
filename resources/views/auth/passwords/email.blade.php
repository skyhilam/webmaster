@extends('layouts.login')


@section('content')

<div class="flex-center">
	<section class="box">
		
		<div class="box-header">

			<h3 class="text-center">
				{{trans('layout.forgot_password')}}
			</h3>

		</div>

		<div class="box-container">
			@if (session('status'))
			<br>
			<br>
			<p class="text-center purple"><span class="icon-mail"></span><br>{{ session('status') }}</p>
			<br><br>
		    @else
			<form action="{{url('/password/forgot')}}" method="post">
				{{csrf_field()}}

				<div>
					<label for="email" class="text-center purple">{{trans('layout.email')}}</label>
					<input type="email" name="email" id="email" autofocus="">
					@if($errors->has('email'))
					<span class="form-error is-visible">* {{$errors->first('email')}}</span>
					@endif
				</div>

				<div class="text-center">
					<br>
					<button type="submit" class="button">{{trans('layout.send')}}</button> <br>
				</div>
				
			</form>
			
			@endif
		</div>
			
	</section>
</div>



@endsection