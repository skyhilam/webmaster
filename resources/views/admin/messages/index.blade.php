@extends('layouts.admin')


@section('content')

@push('console_content')
<div class="float-right">
	<a href="{{url('/messages/compose')}}" class="button">{{trans('layout.compose')}}</a>
</div>
{!! Breadcrumbs::render('messages') !!}
@if (session('status'))
    <div class="success callout">
        {{ session('status') }}
    </div>
@endif


<table class="box">
	@foreach($messages as $item)
	<tr>
		<td width="100"><p>{{$item->created_at->format('Y-m-d')}}</p></td>
		<td width="50"><p>{{$item->created_at->format('H:i')}}</p></td>
		<td><p>{{$item->subject}}</p></td>
		<td width="80"><a href="{{url('/messages/info/'. $item->id)}}">{{trans('layout.read')}}</a></td>
	</tr>
	@endforeach
</table>
<div class="text-center">
	{{$messages->links()}}
</div>

@endpush
@include('admin.console_container')


@endsection