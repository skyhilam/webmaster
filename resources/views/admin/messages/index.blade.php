@extends('layouts.admin')


@section('content')

<div class="row">
	<div class="columns">
		
		<div class="console-section">
			
			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('messages') !!}
				</div>
			</div>

			@if (session('status'))
			<div class="row">
				<div class="columns">
				    <div class="success callout">
				        {{ session('status') }}
				    </div>
				</div>
			</div>
			@endif

			<div class="row medium-up-5">
				<div class="column">
					<a href="{{url('/messages/compose')}}" class="body-color">
						<div class="box board text">
							{{trans('layout.compose')}}
						</div>
					</a>
				</div>
				
				@foreach($messages as $item)
				<div class="column">
					<a href="{{url('/messages/info/'. $item->id)}}" class="body-color">
						<div class="box board text">
							{{str_limit($item->subject, 20)}} <br>
							{{$item->created_at->format('Y-m-d H:i')}}
						</div>
					</a>
				</div>
				@endforeach

			</div>

		</div>

	</div>
</div>





@endsection