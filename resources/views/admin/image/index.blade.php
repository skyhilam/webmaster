@extends('layouts.admin')

@section('content')
@if (session('success'))
    <div class="success callout">
        {{ session('success') }}
    </div>
@endif

<form action="{{url('/post')}}" method="post" enctype="multipart/form-data">
	<h1>Image test form</h1>
	{{ csrf_field() }}
	<label for="content">Post content</label>
	<textarea name="content" id="content" cols="30" rows="10"></textarea>
	<div class="row">
		<div class="columns medium-10">
			<imageuploader name="files" content="Add image" multiple="multiple" action="{{url('/image/upload')}}" api="{{url('/image')}}" base="{{config('cloudder.baseUrl')}}"></imageuploader>
		</div>
 		<div class="columns medium-2">
			<button type="submit" class="button expanded">Submit</button>
		</div>
	</div>

</form>

@endsection