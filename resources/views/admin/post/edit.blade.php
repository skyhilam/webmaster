@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns medium-8 medium-centered">
		
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.types'), 'render' => 'post/edit'])
		

		<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			@if($param == 'type')
			<select name="type_id" id="type">
				@foreach($types as $type)
				<option value="{{$type->id}}" {{$type->id == $data->type_id? 'selected': '' }}>{{$type->title}}</option>
				@endforeach
			</select>
			@elseif($param == 'title')
			<div>
				<label for="title">{{trans('layout.title')}}</label>
				<input type="text" name="title" id="title" value="{{$data->title}}">
			</div>
			@elseif($param == 'content')
			<div>
				<label for="content">{{trans('layout.content')}}</label>
				<textarea name="content" id="content" cols="30" rows="10">{{$data->content}}</textarea>
			</div>
			@elseif($param == 'images')

			<div class="row medium-up-4" >
				@foreach($data->images as $item)
		        <div class="column" >
		        	<label>
					<img src="{{config('cloudder.baseUrl'). '/w_157,h_105,c_thumb/'. $item->image->public_id}}" >
					<input type="checkbox" name="deleteImages[]" value="{{$item->image->id}}" >
					{{trans('layout.delete_images')}}
					</label>
		        </div>
		        @endforeach
		    </div>

		    <div>
			    <label for="images">{{trans('layout.image')}}</label>
				<input type="file" id="images" name="images[]" multiple="multiple">
			</div>
			@elseif($param == 'image')
			<div class="row medium-up-4" >
				@foreach($data->images as $item)
		        <div class="column" >
		        	<label>
					<img src="{{config('cloudder.baseUrl'). '/w_157,h_105,c_thumb/'. $item->image->public_id}}" >
					<input type="radio" name="default_image_id" value="{{$item->image->id}}" {{$data->default_image_id == $item->image->id? 'checked': ''}}>
					{{trans('layout.default_image')}}
					</label>
		        </div>
		        @endforeach
		    </div>
			@endif
			
			<button type="submit" class="button expanded">{{trans('layout.edit')}}</button>

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

@include('admin.post._script')

@endsection
