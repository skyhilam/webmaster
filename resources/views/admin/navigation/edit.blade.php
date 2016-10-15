@extends('layouts.admin.edit_form', ['breadcrumb' => 'navigations/edit', 'item' => $navigation])



@section('form')

@if($param == 'type')
<tr>
	<td width="150" class="text-center"><label for="type">{{trans('layout.type')}}</label></td>
	<td >
		<select name="type" id="type" >
			@for($i=0; $i< 4; $i++)
			<option value="{{$i}}" {{$navigation->$param == $i?'selected':''}}>{{$i}}</option>
			@endfor
		</select>
		@if($errors->has('type'))<span class="form-error is-visible">* {{$errors->first('type')}}</span>@endif
	</td>
</tr>
@elseif($param == 'icon')
<tr>
	<td width="150" class="text-center"><label for="icon">{{trans('layout.icon')}}</label></td>
	<td>
		<?php $icons = ['page', 'mail', 'home', 'members', 'setting', 'analytics'] ?>
		<select name="icon" id="icon">
			@foreach($icons as $icon)
			<option value="{{$icon}}" {{$navigation->$param == $icon?'selected':''}}>{{$icon}}</option>
			@endforeach
		</select>
		@if($errors->has('icon'))<span class="form-error is-visible">* {{$errors->first('icon')}}</span>@endif
	</td>
</tr>
@elseif($param == 'permission')
<tr>
	<td width="150" class="text-center"><label for="permission">{{trans('layout.permission')}}</label></td>
	<td>
		<?php $list = [
			['title' => 'admin and up', 'value' => 'admin'], 
			['title' => 'redac and up', 'value' => 'redac'],
			['title' => 'user and up', 'value' => 'user']] ?>
		<select name="permission" id="permission">
			@foreach($list as $item)
			<option value="{{$item['value']}}" {{$navigation->$param == $item['value']?'selected':''}}>{{$item['title']}}</option>
			@endforeach
		</select>
		@if($errors->has('permission'))<span class="form-error is-visible">* {{$errors->first('permission')}}</span>@endif
	</td>
</tr>
@else
@include('admin.inputs.input', ['id' => $param, 'label' => $param, 'name' => $param, 'type' => 'text', 'autofocus' => 'autofocus', 'value' => $navigation->$param])
@endif


@endsection