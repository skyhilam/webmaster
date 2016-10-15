@extends('layouts.admin.index_form', ['breadcrumb' => 'messages', 'row' => true])


@section('form')


<table class="box">
	<thead>
		<tr>
			<th width="200"><p>{{trans('layout.email')}}</p></th>
			<th ><p>{{trans('layout.subject')}}</p></th>
			<th width="80"><p class="text-center">{{trans('layout.read')}}</p></th>
		</tr>
	</thead>

	<tbody>
		@if(count($inbox) > 0)
		@foreach($inbox as $item)
		<tr>
			<td><p>{{str_limit($item->message->email, 15)}}</p></td>
			<td><a href="{{url('/messages/info/'. $item->id)}}"><p>{{str_limit($item->message->content, 80)}}</p></a></td>
			<td><p class="text-center"><input type="checkbox" disabled="true" {{$item->seen?'checked':''}} style="margin-bottom: 0"></p></td>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan="3"><p>Nothing...</p></td>
		</tr>
		@endif
	</tbody>
</table>

<div class="text-center">
	{{$inbox->links()}}
</div>



@endsection