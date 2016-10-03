@extends('layouts.admin')


@section('content')

<?php 
	$trs = [
		['lable' => trans('layout.type'), 'data' => $post->type->title, 'url' => url("/post/edit/{$post->id}/type"), 'html' => false],
		['lable' => trans('layout.title'), 'data' => $post->title, 'url' => url("/post/edit/{$post->id}/title"), 'html' => false],
		['lable' => trans('layout.content'), 'data' => $post->content, 'url' => url("/post/edit/{$post->id}/content"), 'html' => true],
	];
 ?>

@push('console_content')
	@include('admin.breadcrumbs.entete', ['title' => trans('layout.info'), 'render' => 'post/info'])
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

			@if($tr['html'])
			<td >{!!$tr['data']!!}</td>
			@else
			<td ><b>{{$tr['data']}}</b></td>
			@endif

			<td width="80"><a href="{{$tr['url']}}">{{trans('layout.edit')}}</a></td>

			@else

			@if($tr['html'])
			<td colspan="2">{!!$tr['data']!!}</td>
			else
			<td colspan="2"><b>{{$tr['data']}}</b></td>
			@endif

			@endif
		</tr>
		@endforeach

		<tr>
			<td class="text-center">{{trans('layout.image')}}</td>
			<td >

				@foreach($post->images as $item)

				<img src="{{climage($item->image->public_id, 'w_40,h_40,c_thumb,q_80')}}" style="margin-right: 15px;">

				@endforeach

			</td>
			<td ><a href="{{url("/post/edit/{$post->id}/images")}}">{{trans('layout.edit')}}</a></td>
		</tr>
		
		<tr>
			<td class="text-center">{{trans('layout.default_image')}}</td>
			<td >
				<img src="{{climage($post->image->public_id, 'w_40,h_40,c_thumb,q_80')}}">
			</td>
			<td ><a href="{{url("/post/edit/{$post->id}/image")}}">{{trans('layout.edit')}}</a></td>
		</tr>

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