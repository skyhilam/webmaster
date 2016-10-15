@extends('layouts.admin.create_form', ['breadcrumb' => 'navigations/create'])


@section('form')

@include('admin.inputs.input', 
	['id' => 'url', 'label' => 'url', 'name' => 'url', 'type' => 'text', 'autofocus' => 'autofocus'])

@include('admin.inputs.input', 
	['id' => 'title', 'label' => 'title', 'name' => 'title', 'type' => 'text'])


<tr>
	<td width="150" class="text-center"><label for="type">{{trans('layout.type')}}</label></td>
	<td >
		<select name="type" id="type" >
			@for($i=0; $i< 4; $i++)
			<option value="{{$i}}" {{old('type') == $i?'selected':''}}>{{$i}}</option>
			@endfor
		</select>
		@if($errors->has('type'))<span class="form-error is-visible">* {{$errors->first('type')}}</span>@endif
	</td>
</tr>


<tr>
	<td width="150" class="text-center"><label for="icon">{{trans('layout.icon')}}</label></td>
	<td>
		<?php $icons = ['page', 'mail', 'home', 'members', 'setting', 'analytics'] ?>
		<select name="icon" id="icon">
			@foreach($icons as $icon)
			<option value="{{$icon}}" {{old('icon') == $icon?'selected':''}}>{{$icon}}</option>
			@endforeach
		</select>
		@if($errors->has('icon'))<span class="form-error is-visible">* {{$errors->first('icon')}}</span>@endif
	</td>
</tr>

<tr>
	<td width="150" class="text-center"><label for="permission">{{trans('layout.permission')}}</label></td>
	<td>
		<?php $list = [
			['title' => 'admin and up', 'value' => 'admin'], 
			['title' => 'redac and up', 'value' => 'redac'],
			['title' => 'user and up', 'value' => 'user']] ?>
		<select name="permission" id="permission">
			@foreach($list as $item)
			<option value="{{$item['value']}}" {{old('permission') == $item['value']?'selected':''}}>{{$item['title']}}</option>
			@endforeach
		</select>
		@if($errors->has('permission'))<span class="form-error is-visible">* {{$errors->first('permission')}}</span>@endif
	</td>
</tr>

@include('admin.inputs.input', 
	['id' => 'item_order', 'label' => 'order', 'name' => 'order', 'type' => 'text', 'value' => old('order')??0])

@endsection