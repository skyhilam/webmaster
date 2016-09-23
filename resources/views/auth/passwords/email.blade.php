@extends('layouts.login')


@section('content')
<br>
<br>
<br>
<br>
<div class="row">
	<div class="column medium-4 medium-centered">
		<div class="callout">
			<form action="{{url('/password/forgot')}}" method="post">

				{{csrf_field()}}

				<div>
					<label for="email"><b>{{trans('layout.email')}}</b></label>
					<input type="email" name="email" id="email" placeholder="{{trans('layout.enter_email_address')}}" autofocus="">
				</div>

				<div>
					<button type="submit" class="button expanded">{{trans('layout.send_reset_password_link')}}</button>
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