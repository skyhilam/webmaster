@extends('layouts.admin')

@section('content')

@if (session('success'))
    <div class="success callout">
        {{ session('success') }}
    </div>
@endif

<div class="row">
	<div class="columns medium-2 medium-offset-10">
		<a href="{{url('/post/create')}}" class="button expanded">create a post</a>
	</div>
</div>

<div class="row medium-up-6">
	@foreach($posts as $post)
	<div class="columns">
		<div>
			<img src="{{config('cloudder.baseUrl'). '/w_254/'. $post->image->public_id}}" >
		</div>
		<a href="{{$url = url('/post/details/'. $post->id)}}">{{str_limit($post->content, 20)}}</a>
		<form action="{{$url}}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="delete">
			<button type="submit" class="button expanded alert">Delete</button>
		</form>
	</div>
	@endforeach
</div>


@endsection
