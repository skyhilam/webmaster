@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('messages/compose') !!}


<form action="{{ request()->url() }}" method="post">
	{{csrf_field()}}
	<table class="box">
		@include('admin.inputs.input', [
		'param' => 'to_group', 
		'type' => 'select', 
		'select' => [
			'options' => ['data' => $roles, 'key' => 'id', 'title' => 'title'], 
			'default' => ['value' => 'total', 'title' => trans('layout.all')]
			]
		])


		@include('admin.inputs.input', ['param' => 'subject', 'type' => 'text'])
		

		@include('admin.inputs.input', ['param' => 'content', 'type' => 'textarea'])
		
	</table>
	<br>
	<div class="text-center">
		<button class="button box" type="submit">{{trans('layout.send')}}</button>
	</div>
</form>


@endpush
@include('admin.console_container')


@endsection