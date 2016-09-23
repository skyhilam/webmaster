@extends('layouts.admin')

@section('content')


@if (count($errors) > 0)
    <div class="alert callout">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="success callout">
        {{ session('success') }}
    </div>
@endif

<form action="{{url('/post/create')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<h1>Create new post</h1>
	<div>
		<textarea name="content" cols="30" rows="10" placeholder="types content">{{old('content')}}</textarea>
	</div>
	<div>
		<input type="file" name="files[]" multiple="multiple">
	</div>
	<div>
		<button type="submit" class="button expanded">Create new post</button>
	</div>

</form>

@endsection