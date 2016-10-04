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

					
					<table class="box">
						@foreach($messages as $item)
						<tr>
							<td width="100"><p>{{$item->created_at->format('Y-m-d')}}</p></td>
							<td width="50"><p>{{$item->created_at->format('H:i')}}</p></td>
							<td><p>{{$item->subject}}</p></td>
							<td width="80"><a href="{{url('/messages/info/'. $item->id)}}">{{trans('layout.read')}}</a></td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>




		</div>
	</div>
</div>




@endsection



@section('js')


@endsection