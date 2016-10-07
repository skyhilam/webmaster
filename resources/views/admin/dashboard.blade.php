@extends('layouts.admin')


@section('content')


<div class="row ">
	<div class="columns">
		<div class="console-section">
		
			
			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('analytics') !!}
				</div>
			</div>


			
			<div class="row medium-up-3">
				@foreach($summary as $key => $item)
				@foreach($item as $subkey =>$subitem)
				<div class="column">
					<div class="text-center box box-container">
						<p>{{trans('layout.analytic_'. $subkey)}}{{trans('layout.analytic_'. $key)}}</p>
						<h1 class="purple">{{$subitem['past']}}</h1>
						@if($subitem['grow'] > 0)
						<p><span class="up">▴ {{ $subitem['grow'] }}% </span>{{trans('layout.analytics_compare_'. $subkey)}}</p>
						@else
						<p><span class="down">▾ {{ $subitem['grow'] }}% </span>{{trans('layout.analytics_compare_'. $subkey)}}</p>
						@endif
					</div>
					<br><br>
				</div>
				@endforeach
				@endforeach
			</div>


			
			<div class="row">
				<div class="column">
					{!! Breadcrumbs::render('messages') !!}

					
					<div class="row medium-up-5">
						
						@foreach($inbox as $item)
						<?php $message = $item->message;?>
						<div class="column">
							<a href="{{url('/messages/info/'. $message->id)}}" class="body-color">
								<div class="box board text">
									{{str_limit($message->subject, 20)}} <br>
									{{trans('layout.from')}}: {{$message->name}}
								</div>
							</a>
						</div>
						@endforeach

					</div>

				</div>
			</div>




		</div>
	</div>
</div>




@endsection



@section('js')


@endsection