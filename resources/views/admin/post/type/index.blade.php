@extends('layouts.admin')


@section('content')


<div class="row">
	<div class="columns">
		<div class="console-section">

			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('postTypes') !!}
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



			<div class="row medium-up-6">
				<div class="column">
					<a href="{{url('/postTypes/create')}}" class="body-color board text box">
						{{trans('layout.create_post_type')}}
					</a>
				</div>

				@foreach($types as $type)
				<div class="column">
					<a href="{{url('/postTypes/info/'. $type->id)}}" class="body-color board text box">
						{{$type->title}}
					</a>
				</div>
				@endforeach
			</div>


		</div>
	</div>
</div>












@endsection