@extends('layouts.admin')

@section('plugin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/medium-editor.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/themes/default.min.css">

@endsection

@section('content')
@push('console_content')
{!! Breadcrumbs::render('post/create') !!}
<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">

	

		{{ csrf_field() }}
		<div class="box">
			<table>
				<tr>
					<td class="text-center" width="150"><label for="type">{{trans('layout.type')}}</label></td>
					<td>
						<select name="type_id" id="type">
							@foreach($types as $type)
							<option value="{{$type->id}}" {{old('type_id') == $type->id? 'selected': ''}}>{{$type->title}}</option>
							@endforeach
						</select>
						@if($errors->has('type_id'))<span class="form-error is-visible">* {{$errors->first('type_id')}}</span>@endif
					</td>
				</tr>

				<tr>
					<td class="text-center"><label for="title">{{trans('layout.title')}}</label></td>
					<td><input type="text" name="title" value="{{old('title')}}" maxlength="250">
					@if($errors->has('title'))<span class="form-error is-visible">* {{$errors->first('title')}}</span>@endif
					</td>
				</tr>

				<tr>
					<td class="text-center"><label for="content">{{trans('layout.content')}}</label></td>
					<td ><textarea class="input-field" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
					@if($errors->has('content'))<span class="form-error is-visible">* {{$errors->first('content')}}</span>@endif
					</td>
				</tr>
				
				<tr>
					<td class="text-center"><label for="images">{{trans('layout.image')}}</label></td>
					<td><input type="file" id="images" name="images[]" multiple="multiple" class="input-field">@if($errors->has('images'))<span class="form-error is-visible">* {{$errors->first('images')}}</span>@endif
					@if($errors->has('images.0'))<span class="form-error is-visible">* {{$errors->first('images.0')}}</span>@endif</td>
				</tr>
			</table>
		</div>



	<div class="text-center">
		<br>
		<button type="submit" class="button box">{{trans('layout.create_new')}}</button>
	</div>
</form>
@endpush
@include('admin.console_container')


<script>
var buttonOptions = ['bold',
            'italic','anchor', 'orderedlist', 'unorderedlist'];
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