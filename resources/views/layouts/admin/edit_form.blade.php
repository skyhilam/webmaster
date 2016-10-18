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

					<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="patch">
						<table class="box">
							@yield('form') 
						</table>
						<br>
						<div class="text-center">
							<button type="submit" class="button box">{{trans('layout.edit')}}</button>
						</div>
					</form>

				</div>
			</div>

		</div>

	</div>
</div>



@endsection