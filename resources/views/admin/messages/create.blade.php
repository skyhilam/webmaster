@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('messages/compose') !!}


<form action="{{ request()->url() }}" method="post">
	{{csrf_field()}}
	<table class="box">
		<tr>
			<td width="150" class="text-center"><label for="to">{{trans('layout.to')}}</label></td>
			<td><input type="text" name="to" id="to" autofocus="true" value="{{old('to')}}"></td>
		</tr>
		<tr>
			<td class="text-center"><label for="cc">{{trans('layout.cc')}}</label></td>
			<td><input type="text" name="cc" id="cc" value="{{old('cc')}}"></td>
		</tr>
		<tr>
			<td class="text-center"><label for="subject">{{trans('layout.subject')}}</label></td>
			<td><input type="text" name="subject" id="subject" value="{{old('subject')}}"></td>
		</tr>
		<tr>
			<td class="text-center"><label for="">{{trans('layout.content')}}</label></td>
			<td><textarea name="content" id="content" cols="30" rows="10" >{{old('content')}}</textarea></td>
		</tr>
	</table>
	<br>
	<div class="text-center">
		<button class="button" type="submit">{{trans('layout.send')}}</button>
	</div>
</form>


@endpush
@include('admin.console_container')


@endsection