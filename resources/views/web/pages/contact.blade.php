@extends('layouts.web')


@section('content')


<div class="row">
	<div class="columns">
		
		


		<form action="{{request()->url()}}" method="post">
			{{csrf_field()}}
			<h1>Contact us</h1>

			<input type="email" name="email" placeholder="Types your eamil" value="{{old('email')}}">
			
			<textarea name="content" placeholder="Types your content" cols="30" rows="10">{{old('content')}}</textarea>

			<button class="button" type="submit">Submit</button>

		</form>
		

		@if(count($errors))
		<div class="callout alert">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif


	</div>
</div>




@endsection