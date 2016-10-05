@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('postTypes/create') !!}

<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">

	{{ csrf_field() }}

	<div class="box">
		<table>
			<tr>
				<td class="text-center" width="150"><label for="title">{{trans('layout.title')}}</label></td>
				<td><input type="text" name="title" value="{{old('title')}}" maxlength="250" autofocus="">
				@if($errors->has('title'))<span class="form-error is-visible">* {{$errors->first('title')}}</span>@endif
				</td>
			</tr>
		</table>
	</div>

	<br>
	<div class="text-center">
		<button type="submit" class="button box">{{trans('layout.create_new')}}</button>
	</div>


</form>

@endpush
@include('admin.console_container')



@endsection
