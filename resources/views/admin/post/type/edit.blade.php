@extends('layouts.admin')


@section('content')

@push('console_content')

{!! Breadcrumbs::render('postTypes/edit', $type) !!}


<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="patch">
	
	
	<table class="box">
		<tr>
			<td width="150" class="text-center">
				<label for="{{$param}}">{{trans('layout.'.$param)}}</label>
			</td>
			
			<td>
				@if($param == 'title')
				<input type="text" name="title" id="title" value="{{$type->title}}" autofocus="">
				@if($errors->has('title'))<span class="form-error is-visible">* {{$errors->first('title')}}</span>@endif
				@endif
			</td>
		</tr>
	</table>

	<br>
	<div class="text-center">
		<button type="submit" class="button box">{{trans('layout.edit')}}</button>
	</div>
</form>



@endpush
@include('admin.console_container')


@endsection
