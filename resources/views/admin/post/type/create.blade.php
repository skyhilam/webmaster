@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns medium-8 medium-centered">
		
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.create'), 'render' => 'post/type/create'])
		

		<form action="{{request()->url()}}" method="post" >
			{{csrf_field()}}

			
			<div>
				<label for="title">{{trans('layout.title')}}</label>
				<input type="text" name="title" id="title" value="{{old('title')}}">
			</div>
			

			
			<button type="submit" class="button expanded">{{trans('layout.create')}}</button>
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

	</div>
</div>



@endsection
