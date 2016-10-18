@extends('layouts.admin')


@section('content')

<div class="row ">
	<div class="columns">
		<div class="console-section">
		
			@if(isset($breadcrumb))
			<div class="row">
				<div class="columns">
					@if(empty($item))
					{!! Breadcrumbs::render($breadcrumb) !!}
					@else
					{!! Breadcrumbs::render($breadcrumb, $item) !!}
					@endif
				</div>
			</div>
			@endif

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