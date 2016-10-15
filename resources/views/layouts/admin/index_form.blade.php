@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns">
		<div class="console-section">
		
			
			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render($breadcrumb) !!}
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
			
			@if(empty($row))
			@yield('form') 
			@else
			<div class="row">
				<div class="columns">
					@yield('form') 	
				</div>
			</div>
			@endif
		</div>
	</div>
</div>


@endsection