@extends('layouts.admin')


@section('content')

@push('console_content')

{!! Breadcrumbs::render('post/edit') !!}
<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="patch">
<table class="box">
	<tr>
		<td width="150" class="text-center">
			<label for="{{$param}}">{{trans('layout.'.$param)}}</label>
		</td>

		<td>
			
			@if($param == 'type')
			<select name="type_id" id="type">
				@foreach($types as $type)
				<option value="{{$type->id}}" {{$type->id == $data->type_id? 'selected': '' }}>{{$type->title}}</option>
				@endforeach
			</select>
			@if($errors->has('type_id'))<span class="form-error is-visible">* {{$errors->first('type_id')}}</span>@endif

			@elseif($param == 'title')
			<div>
				<input type="text" name="title" id="title" value="{{$data->title}}">
				@if($errors->has('title'))<span class="form-error is-visible">* {{$errors->first('title')}}</span>@endif
			</div>
			@elseif($param == 'content')
			<div>
				<textarea name="content" id="content" cols="30" rows="10" class="large">{{$data->content}}</textarea>
				@if($errors->has('content'))<span class="form-error is-visible">* {{$errors->first('content')}}</span>@endif
			</div>
			@elseif($param == 'images')

			<div >
				@foreach($data->images as $item)
		        <div style="display: inline-block; margin-right: 10px">
		        	<label>
			        	<div>
							<img src="{{config('cloudder.baseUrl'). '/w_200,h_144,q_80,c_thumb/'. $item->image->public_id}}" >
						</div>
						<input type="checkbox" name="deleteImages[]" value="{{$item->image->id}}" >
						{{trans('layout.delete_images')}}
					</label>
		        </div>
		        @endforeach
		    </div>
			<br>
		    <div>
		    	{{trans('layout.upload_image')}}
				<input type="file" id="images" name="images[]" multiple="multiple">
			</div>
			@elseif($param == 'image')
			<div >
				@foreach($data->images as $item)
		        <div style="display: inline-block; margin-right: 10px">
		        	<label>
			        	<div>
							<img src="{{config('cloudder.baseUrl'). '/w_200,h_144,q_80,c_thumb/'. $item->image->public_id}}" >
						</div>
						<input type="radio" name="default_image_id" value="{{$item->image->id}}" {{$data->default_image_id == $item->image->id? 'checked': ''}}>
						{{trans('layout.default_image')}}
					</label>
		        </div>
		        @endforeach
		    </div>
			@endif
			<br>
			<br>

		</td>
	</tr>
	
</table>
<br>
<div class="text-center">
	<button type="submit" class="button box">{{trans('layout.edit')}}</button>
</div>
</form>


@endpush
@include('admin.console_container')


@include('admin.post._script')

@endsection
