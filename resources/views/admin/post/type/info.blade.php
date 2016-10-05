@extends('layouts.admin')


@section('content')

<?php 
	$trs = [
		['lable' => trans('layout.title'), 'data' => $type->title, 'url' => url("/postTypes/edit/{$type->id}/title"), 'html' => false],
	];
 ?>

@push('console_content')
	{!! Breadcrumbs::render('postTypes/info', $type) !!}

	@if (session('status'))
	    <div class="success callout">
	        {{ session('status') }}
	    </div>
	@endif


	<table class="box">
		@foreach($trs as $tr)
		<tr>
			<td width="150" class="text-center">{{$tr['lable']}}</td>
			@if($tr['url'])

			<td ><b>{{$tr['data']}}</b></td>

			<td width="80"><a href="{{$tr['url']}}">{{trans('layout.edit')}}</a></td>

			

			@endif
		</tr>
		@endforeach

	
	</table>
	<br>
	<form  method="post" action="{{request()->url()}}" class="text-center">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="delete">

		<button type="button" class="button box" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
	</form>	
	<br><br>
@endpush


@include('admin.console_container')


<script>
	function confirmDelete(e)
	{
		if (confirm('{{trans('layout.confirm_delete')}}')) {
			$(e).parents('form').submit();
		}
	}
</script>
@endsection