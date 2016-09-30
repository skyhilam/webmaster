@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns medium-8 medium-centered">
		
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.types'), 'render' => 'post/type/edit'])
		

		<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			@if($param == 'title')
			
			<div>
				<label for="title">{{trans('layout.title')}}</label>
				<input type="text" name="title" id="title" value="{{$type->title}}">
			</div>
			
			@endif
			
			<button type="submit" class="button expanded">{{trans('layout.edit')}}</button>

		</form>

		<form  action="{{request()->url()}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">

			<button type="button" class="button alert expanded" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
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

<script>
	function confirmDelete(e)
	{
		if (confirm('{{trans('layout.confirm_delete')}}')) {
			$(e).parents('form').submit();
		}
	}
</script>

@endsection
