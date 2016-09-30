@extends('layouts.admin')


@section('content')
<br>
<div class="row">
	<div class="columns medium-8 medium-centered">
		@if (session('status'))
		    <div class="success callout">
		        {{ session('status') }}
		    </div>
		@endif

		@if (count($errors->delete) > 0)
		    <div class="alert callout">
		        <ul>
		            @foreach ($errors->delete->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		
		<h3>{{trans('layout.members')}}</h3>
		<br>

		<div class="row collapse">
			<div class="columns medium-10">
				<form action="{{url('/members')}}" method="get">
					<select name="role" id="role-select">
						<option value="total" {{$role == 'total'? 'selected': ''}}>All</option>
						@foreach($roles as $item)
						<option value="{{$item->slug}}" {{$item->slug == $role? 'selected': ''}}>{{$item->title}}</option>
						@endforeach
					</select>
				</form>
			</div>
			<div class="columns medium-2">
				<a href="{{url('member/create')}}" class="button expanded">{{trans('layout.create_new')}}</a>
			</div>
		</div>
	
		<table>
			<thead>
				<tr>
					<th>{{trans('layout.name')}}</th>
					<th>{{trans('layout.email')}}</th>
					<th width="200" class="text-center">{{trans('layout.role')}}</th>
					<th width="80"></th>
				</tr>
			</thead>

			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td class="text-center">{{trans('layout.'. $user->role->slug)}}</td>
					<td><a href="{{url('/member/info/'. $user->public_id)}}" >{{trans('layout.info')}}</a></td>
					<!-- <td>
						<form action="{{url('member/delete/'. $user->public_id)}}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="delete">
							<div class="button-group expanded" style="margin-bottom: 0">
								<a href="{{url('/member/info/'. $user->public_id)}}" class="button">{{trans('layout.info')}}</a>
								<a href="{{url('/member/edit/'. $user->public_id)}}" class="button warning">{{trans('layout.edit')}}</a>
								<button class="button alert" type="submit">{{trans('layout.delete')}}</button>
							</div>
						</form>
					</td> -->
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$users->links()}}
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

