@extends('layouts.admin')


@section('content')
<br>
<div class="row collapse">
	<div class="columns medium-8 medium-centered">

		@include('admin.breadcrumbs.entete', ['title' => trans('layout.personal'), 'render' => 'members/info'])
		
		<table>
			<tr>
				<td>{{trans('layout.email')}}</td>
				<td colspan="2">{{$user->email}}</td>
			</tr>
			<tr>
				<td width="100">{{trans('layout.role')}}</td>
				<td >{{trans('layout.'.$user->role->slug)}}</td>
				<td width="80"><a href="{{url('/member/edit/role/'. $user->public_id)}}">{{trans('layout.edit')}}</a></td>
			</tr>
			
			<tr>
				<td >{{trans('layout.name')}}</td>
				<td >{{$name = $user->name}}</td>
				<td><a href="{{url('/member/edit/name/'. $user->public_id)}}">{{trans('layout.edit')}}</a></td>
			</tr>
			<tr>
				<td>{{trans('layout.password')}}</td>
				<td>********</td>
				<td><a href="{{url('/member/edit/password/'. $user->public_id)}}">{{trans('layout.edit')}}</a></td>
			</tr>
		</table>
		
		<form  method="post" action="{{url('/member/delete/'. $user->public_id)}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">

			<button type="button" class="button alert expanded" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
		</form>
		
		<div>
		</div>
	</div>
</div>


<script>
	function confirmDelete(e)
	{
		if (confirm('{{trans('layout.confirm_delete')}}')) {
			$(e).parents('form').submit();
		}
	}
</script>
@endsection