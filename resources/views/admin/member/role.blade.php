@extends('layouts.admin')


@section('content')
<br>
<div class="row collapse">
	<div class="columns medium-8 medium-centered">
		@include('admin.breadcrumbs.entete', ['title' => trans('layout.role'), 'render' => 'members/edit/role'])

		<form action="{{Request::url()}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="patch">
			<label for="role">{{trans('layout.role')}}</label>
			<select name="role" id="role">
				@foreach($roles as $role)
				<option value="{{$role->id}}" {{$role->id == $user->role_id? 'selected': ''}}>
					{{trans('layout.'. $role->slug)}}
				</option>
				@endforeach
			</select>
			<button type="submit" class="button expanded success">{{trans('layout.save')}}</button>
		</form>

		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif

		@if (count($errors) > 0)
		    <div class="alert callout">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
</div>


@endsection