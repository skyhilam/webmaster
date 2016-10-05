@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('member/info', $user) !!}

@if (session('status'))
    <div class="success callout">
        {{ session('status') }}
    </div>
@endif

<table class="box">
	<tr>
		<td width="150" class="text-center"><p >{{trans('layout.email')}}</p></td>
		<td colspan="2"><p>{{$user->email}}</p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.role')}}</p></td>
		<td ><p>{{trans('layout.'.$user->role->slug)}}</p></td>
		<td width="80"><p><a href="{{url('/member/edit/role/'. $user->public_id)}}">{{trans('layout.edit')}}</a></p></td>
	</tr>

	<tr>
		<td class="text-center"><p >{{trans('layout.name')}}</p></td>
		<td ><p>{{$name = $user->name}}</p></td>
		<td><p><a href="{{url('/member/edit/name/'. $user->public_id)}}">{{trans('layout.edit')}}</a></p></td>
	</tr>
	<tr>
		<td class="text-center"><p >{{trans('layout.password')}}</p></td>
		<td><p>****************</p></td>
		<td><p><a href="{{url('/member/edit/password/'. $user->public_id)}}">{{trans('layout.edit')}}</a></p></td>
	</tr>
</table>
<br>
<form  method="post" action="{{url('/member/delete/'. $user->public_id)}}" class="text-center">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="delete">

	<button type="button" class="button box" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
</form>



@endpush
@include('admin.console_container')



<script>
	function confirmDelete(e)
	{
		if (confirm('{{trans('layout.confirm_delete')}}')) {
			$(e).parents('form').submit();
		}
	}
</script>
@endsection