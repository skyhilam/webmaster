@extends('layouts.admin')

@section('plugin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/medium-editor.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/themes/default.min.css">

@endsection

@section('content')

<div class="row ">
	<div class="columns medium-8 medium-centered">

			
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.create'), 'render' => 'post/create'])

		<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div>
				<label for="type">{{trans('layout.type')}}</label>
				<select name="type_id" id="type">
					@foreach($types as $type)
					<option value="{{$type->id}}" {{old('type_id') == $type->id? 'selected': ''}}>{{$type->title}}</option>
					@endforeach
				</select>
			</div>
			<div>
				<label for="title">{{trans('layout.title')}}</label>
				<input type="text" name="title" value="{{old('title')}}" maxlength="250">
			</div>
			
			<div>
				<label for="content">{{trans('layout.content')}}</label>
				<textarea name="content" id="content" cols="30" rows="10" >{{old('content')}}</textarea>
			</div>
			<div>
				<label for="images">{{trans('layout.image')}}</label>
				<input type="file" id="images" name="images[]" multiple="multiple">
			</div>
			<div>
				<button type="submit" class="button expanded">{{trans('layout.create_new')}}</button>
			</div>

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
var buttonOptions = ['anchor', 'orderedlist', 'unorderedlist', 'h6'];
	var editor = new MediumEditor('#content', {
		autoLink: true,
		toolbar: {
            buttons: buttonOptions,
        },
        placeholder: {
	        text: ''
	    }
	});
</script>
@endsection