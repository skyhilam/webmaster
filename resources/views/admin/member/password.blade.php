@extends('layouts.admin')


@section('content')
<br>
<div class="row collapse">
	<div class="columns medium-8 medium-centered">
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.password'), 'render' => 'members/edit/password'])

		<form action="{{Request::url()}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			
			<label for="password">{{trans('layout.new_password')}}</label>
			<input type="password" id="password" name="password">
			
			<label for="password-confirmed">{{trans('layout.confirm_new_password')}}</label>
			<input type="password" name="password_confirmation" id="password-confirmed">


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