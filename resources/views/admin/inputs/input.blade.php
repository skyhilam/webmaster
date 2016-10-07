<tr>
	<td width="150" class="text-center">
		<label for="{{$param}}">{{trans('layout.'. $param)}}</label>
	</td>
	<td >
	@if($type == 'textarea')
		<textarea class="{{$class??''}}" name="{{$param}}" id="{{$param}}" cols="30" rows="10" {{$autofocus??''}}>{{$value??old($param)}}</textarea>
		@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif

	@elseif($type == 'select')
		<?php $options = $select['options']; $key = $options['key']; $title = $options['title']; $data = $options['data']; $default = $select['default']; ?>
		<select name="{{$param}}" id="{{$param}}">
			@if($default)
			<option value="{{$default['value']}}">{{$default['title']}}</option>
			@endif
			@foreach($data as $item)
			<option value="{{$item->$key}}" {{old($param) == $item->$key? 'selected': ''}}>{{$item->$title}}</option>
			@endforeach
		</select>
		
		@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif
	@else
		<input class="{{$class?? ''}}" type="{{$type}}" name="{{$param}}" id="{{$param}}" value="{{$value??old($param)}}" {{$autofocus??''}}>
		@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif
	@endif
	</td>
</tr>