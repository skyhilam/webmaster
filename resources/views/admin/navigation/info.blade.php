@extends('layouts.admin.info_form', ['breadcrumb' => 'navigations/info', 'item' => $navigation])

@section('form')

@foreach($navigation->toArray() as $key => $value)
<tr>
	@if($key != 'id')
	<td width="150" class="text-center"><p>{{trans('layout.'.$key)}}</p></td>
	<td><a href="/navigations/edit/{{$navigation['id']}}/{{$key}}"><p>{{$value}}</p></a></td>
	@endif
</tr>
@endforeach
@endsection