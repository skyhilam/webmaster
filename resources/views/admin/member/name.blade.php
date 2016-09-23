@extends('layouts.admin')


@section('content')
<br>
<div class="row collapse">
	<div class="columns medium-8 medium-centered">
		<h3>{{trans('layout.name')}}</h3>
		<br>
		{!! Breadcrumbs::render('members/edit/name') !!}

		<form action="{{Request::url()}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			<label for="name">{{trans('layout.name')}}</label>
			<input type="text" name="name" value="{{$user->name}}">
			<button type="submit" class="button expanded success">{{trans('layout.save')}}</button>
		</form>

		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif

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