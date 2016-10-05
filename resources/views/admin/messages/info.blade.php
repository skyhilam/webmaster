@extends('layouts.admin')


@section('content')

@push('console_content')
{!! Breadcrumbs::render('messages/info', $message->subject) !!}



<table class="box">
	<tr>
		<td width="150" class="text-center"><p>{{trans('layout.date')}}</p></td>
		<td><p>{{$message->created_at->format('Y-m-d H:i')}}</p></td>
	</tr>

	<tr>
		<td class="text-center"><p>{{trans('layout.subject')}}</p></td>
		<td><p>{{$message->subject}}</p></td>
	</tr>

	<tr>
		<td class="text-center"><p>{{trans('layout.content')}}</p></td>
		<td><p>{{$message->content}}</p> <br></td>
	</tr>
</table>
<br>
	<form  method="post" action="{{request()->url()}}" class="text-center">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="delete">

		<button type="button" class="button box" onclick="confirmDelete(this)">{{trans('layout.delete')}}</button>
	</form>	
	<br><br>
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