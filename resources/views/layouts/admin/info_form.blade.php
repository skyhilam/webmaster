@extends('layouts.admin')


@section('content')



<div class="row">
	<div class="column">
		<div class="console-section">

			<div class="row">
				<div class="columns">
					@if(empty($item))
					{!! Breadcrumbs::render($breadcrumb) !!}
					@else
					{!! Breadcrumbs::render($breadcrumb, $item) !!}
					@endif
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

			<div class="row">
				<div class="columns">
					<table class="box">
						@yield('form') 
					</table>
				</div>
			</div>
			<br>
			
			@if(empty($logout))
			<div class="row">
				<div class="columns">
					<form  method="post" action="{{request()->url()}}" class="{{$button?? 'text-center'}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="delete">

						<button type="button" class="button box" onclick="confirmDelete(this, '{{trans('layout.confirm_delete')}}')">{{trans('layout.delete')}}</button>
					</form>
					<br><br>
				</div>
			</div>
			@else
			<div class="{{$button?? 'text-center'}}">
				<a class="button box" href="{{url('/logout')}}">{{trans('layout.logout')}}</a>
			</div>
			@endif

		</div>
	</div>
</div>






@endsection
