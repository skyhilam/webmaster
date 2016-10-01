@extends('layouts.admin')


@section('content')

<?php 
	$trs = [
		['lable' => trans('layout.type'), 'data' => $post->type->title, 'url' => url("/post/edit/{$post->id}/type"), 'html' => false],
		['lable' => trans('layout.title'), 'data' => $post->title, 'url' => url("/post/edit/{$post->id}/title"), 'html' => false],
		['lable' => trans('layout.content'), 'data' => $post->content, 'url' => url("/post/edit/{$post->id}/content"), 'html' => true],
	];
 ?>

<div class="row">
	<div class="columns medium-8 medium-centered">

		@include('admin.breadcrumbs.entete', ['title' => trans('layout.info'), 'render' => 'post/info'])

		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif


		<table>
			@foreach($trs as $tr)
			<tr>
				<td width="100">{{$tr['lable']}}</td>
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
				<td width="100">{{trans('layout.image')}}</td>
				<td class="row medium-up-6">
					@foreach($post->images as $item)
					<div class="column">
						<img src="{{climage($item->image->public_id, 'w_68,h_68,c_thumb')}}">
					</div>
					@endforeach
					
				</td>
				<td width="80"><a href="{{url("/post/edit/{$post->id}/images")}}">{{trans('layout.edit')}}</a></td>
			</tr>
			
			<tr>
				<td width="100">{{trans('layout.default_image')}}</td>
				<td >
					<img src="{{climage($post->image->public_id, 'w_68,h_68,c_thumb')}}">
				</td>
				<td width="80"><a href="{{url("/post/edit/{$post->id}/image")}}">{{trans('layout.edit')}}</a></td>
			</tr>

		</table>

		<form  method="post" action="{{request()->url()}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">

			<button type="button" class="button alert expanded" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
		</form>	

	</div>
</div>

<script>
	function confirmDelete(e)
	{
		if (confirm('{{trans('layout.confirm_delete')}}')) {
			$(e).parents('form').submit();
		}
	}
</script>
@endsection