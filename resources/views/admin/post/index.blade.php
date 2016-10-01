@extends('layouts.admin')

@section('content')
<br>
<div class="row ">
	<div class="columns">
		
		<div class="row">
			<div class="columns">
				@if (session('status'))
				    <div class="success callout">
				        {{ session('status') }}
				    </div>
				@endif
			</div>
		</div>

		<div class="row">

			<div class="columns medium-3">
				<form action="{{$url = request()->url()}}" method="get">
					<select name="type" onchange="Change(this)">
						<option value="all">{{trans('layout.all')}}</option>
						@foreach($types as $type)
						<option value="{{$type->id}}" {{request()->input('type', '') == $type->id? 'selected': ''}}>{{$type->title}}</option>
						@endforeach
					</select>
				</form>
			</div>
			
			<div class="columns medium-6">	
				<form action="{{$url}}" method="get"  class="input-group">
					<input type="text" name="keyworks" class="input-group-field" value="{{request()->input('keyworks', '')}}">
					<div class="input-group-button">
						<button type="submit"  class="button">{{trans('layout.search')}}</button>
					</div>
				</form>
			</div>
			
			<div class="columns medium-3">
				<a href="{{url('/post/create')}}" class="button expanded">{{trans('layout.create_new')}}</a>
			</div>
			

		</div>

		<div class="row medium-up-4">
			@foreach($posts as $post)
			<div class="columns">
				<div class="image">
					<a href="{{$url = url('/post/info/'. $post->id)}}">
					<img src="{{config('cloudder.baseUrl'). '/w_254,h_169,c_thumb/'. $post->image->public_id}}" >
					</a>
				</div>
				<p>
					<a href="{{$url}}">{{str_limit($post->title, 30)}}</a><br>
				</p>
				
				
			</div>
			@endforeach
		</div>

		<div>
			{{$posts->links()}}
		</div>
	</div>
</div>


<script>
	function Change(that)
	{
		$(that).parents('form').submit();
	}
</script>

@endsection
