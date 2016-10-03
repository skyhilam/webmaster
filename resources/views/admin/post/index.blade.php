@extends('layouts.admin')

@section('content')


<div class="row ">
	<div class="columns">
		<div class="console-section">
		
			
			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('posts') !!}
				</div>
			</div>

			<div class="row">
				<div class="columns">
					@if (session('status'))
					    <div class="success callout">
					        {{ session('status') }}
					    </div>
					@endif
				</div>
			</div>

			<!-- <div class="row">

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
				

			</div> -->
			<div class="row medium-up-3">
				<div class="column">
					<a href="{{url('/post/create')}}" class="body-color">
					<div class="box board flex-center">
						<div class="text-center ">
							<p><img src="{{asset('/img/admin/plus.png')}}"></p>
							<p >{{trans('layout.create_project')}}</p>
						</div>
					</div>
					</a>
				</div>
				@foreach($posts as $post)
				<div class="column">
					<a href="{{$url = url('/post/info/'. $post->id)}}" class="body-color">
					<div class="box board">
						<div class="board-picture">
							<img src="{{config('cloudder.baseUrl'). '/w_353,h_188,c_thumb,q_80/'. $post->image->public_id}}" >
						</div>
						<div class="board-content">
							<p>{{str_limit($post->title, 40)}}</p>
						</div>
					</div>
					</a>
					<br>
				</div>
				@endforeach

			</div>

			<div class="text-center">
				{{$posts->links()}}
			</div>


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
