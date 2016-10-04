@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns medium-8 medium-centered">
			
		<div class="row collapse">
			<div class="columns medium-2 medium-offset-10">
				<a href="{{url('/postTypes/create')}}" class="button expanded">{{trans('layout.create_new')}}</a>
			</div>
		</div>

		<table>
			@foreach($types as $type)
			<tr>
				<td>{{$type->title}}</td>
				<td width="80"><a href="{{url('/postTypes/edit/'. $type->id. '/title')}}">{{trans('layout.edit')}}</a></td>
			</tr>
			@endforeach
		</table>
			
	</div>
</div>


@endsection