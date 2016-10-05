@extends('layouts.admin')


@section('content')
<div class="row ">
	<div class="columns">
		<div class="console-section">
	

			<div class="row">
				<div class="columns">
					{!! Breadcrumbs::render('members') !!}
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
			
			<div class="row medium-up-4">
				<div class="column">
					<a href="{{url('member/create')}}" class="body-color">
					<div class="box board flex-center text text-center">
						{{trans('layout.create_member')}}
					</div>
					</a>
				</div>
				@foreach($users as $user)
				<div class="column">
					<a href="{{$url =url('/member/info/'. $user->public_id)}}" class="body-color">
						<div class="box board text text-center">
							{{trans('layout.'. $user->role->slug)}} 
							<br> 
							{{str_limit($user->name, 40)}}
						</div>
					</a><br>
				</div>
				@endforeach
			</div>

			<div class="text-center">
				{{$users->links()}}
			</div>

		</div>
	</div>
</div>







@endsection


@section('js')

<script>
	$('#role-select').change(function() {
		$(this).parent().submit();
	});
</script>

@endsection

