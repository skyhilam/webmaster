@extends('layouts.admin')

@section('content')

@if (session('success'))
    <div class="success callout">
        {{ session('success') }}
    </div>
@endif

<form action="{{$url = url('/post/details/'. $post->id)}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}

	<textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>


	<div class="row medium-up-6" >
		@foreach($post->images as $item)
        <div class="column" >
        	<label>
			<img src="{{config('cloudder.baseUrl'). '/w_254/'. $item->image->public_id}}" >
			<input type="checkbox" name="deleteImages[]" value="{{$item->image->id}}" >
			delete image
			</label>
        </div>
        @endforeach
    </div>


	<div class="row">
		<div class="column">
			<input type="file" name="files[]" multiple="multiple">
		</div>
	</div>
	
	<div class="row">
		<div class="column">
			<button type="submit" class="button expanded">Save & Update</button>
		</div>
		<div class="column">
			<a href="{{url()->previous()}}" class="button expanded">Cancel</a>
		</div>
	</div>
	
</form>


@endsection
