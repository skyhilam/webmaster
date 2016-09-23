@extends('layouts.default')


@section('content')

<div class="row">
	<div class="columns medium-4 medium-centered">
		<form action="{{url('/message')}}" method="post">
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
				<label for="content"><b>Content</b></label>
				<textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
			</div>

			<div>
				<button class="button expanded" type="submit">Send message to us</button>
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

		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif
	</div>
</div>

@endsection