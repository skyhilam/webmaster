@extends('layouts.admin')



@section('content')

<br>
<div class="row">
	<div class="columns medium-8 medium-centered">
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.name'), 'render' => 'setting/name'])
		<form action="{{url('/setting/name')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			
			<label for="name">{{trans('layout.name')}}</label>
			<input type="text" id="name" value="{{$name}}" name="name">
			<button class="button expanded success" type="submit">{{trans('layout.save')}}</button>
		</form>

		@if (count($errors) > 0)
		    <div class="alert callout">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
</div>



@endsection
