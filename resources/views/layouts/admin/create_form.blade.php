@extends('layouts.admin')


@section('content')



@push('console_content')
{!! Breadcrumbs::render($breadcrumb) !!}
<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">

	

	{{ csrf_field() }}
	<table class="box">
		@yield('form') 
	</table>
	


	<div class="text-center">
		<br>
		<button type="submit" class="button box">{{trans('layout.create_new')}}</button>
	</div>
</form>
@endpush
@include('admin.console_container')


@endsection