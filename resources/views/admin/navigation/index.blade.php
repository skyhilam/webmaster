@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns">
		<div class="console-section">
		
			
			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('navigations') !!}
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


			<div class="row medium-up-5">
				<div class="column">
					<a href="{{url('/navigations/create')}}" class="body-color">
						<div class="box board text">
							{{trans('layout.create')}}
						</div>
					</a>
				</div>
			</div>
			<br><br>
			@foreach($navigations as $i => $group)
			<div class="row">
				<div class="columns">
					<h5>{{trans('layout.group')}} {{$i}}</h5>
				</div>
			</div>
			<div class="row medium-up-5">
				@foreach($group as $item)
					<div class="column">
						<a href="{{url('/navigations/info/'. $item->id)}}" class="body-color">
							<div class="box board text">
								<span class="icon-{{$item->icon}} bookmark text-center" style="{{$item->icon != 'mail'?: 'font-size: 13px'}}"></span> {{trans('layout.'.$item->title)}} <br>
							</div>
						</a>
						<br>
					</div>
				@endforeach
			</div>
			<br><br>
			@endforeach

		</div>
	</div>
</div>

@endsection