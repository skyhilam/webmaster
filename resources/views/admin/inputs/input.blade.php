<?php 
	/**
	* @param $class string
	* @param $type string default text
	* @param $name stirng
	* @param $id string
	* @param $value string
	* @param $autofocus boolean
	* @param $label string 
	* @param $placeholder string
	**/
 ?>

<tr>
	<td width="150" class="text-center">
		<label for="{{$id}}">{{trans('layout.'. $label)}}</label>
	</td>
	<td >
	@if($type == 'textarea')
		<textarea class="{{$class??''}}" name="{{$param}}" id="{{$param}}" cols="30" rows="10" {{$autofocus??''}}>{{$value??old($param)}}</textarea>
		@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif
	@elseif($type == 'checkbox')
		<div class="row medium-up-8">

		@if(isset($values))

			@foreach($options as $item)
			<div class="column">
				<label><input type="checkbox" value="{{$item->$value}}" style="margin-bottom: 0" name="{{$multiple? $param.'[]': $item->$name}}" {{!is_numeric($values->search($item))?:'checked'}}> {{$item->$label}} </label>
			</div>
			@endforeach

		@else

			@foreach($options as $item)
			<div class="column">
				<label><input type="checkbox" value="{{$item->$value}}" style="margin-bottom: 0" name="{{$multiple? $param.'[]': $item->$name}}"> {{$item->$label}}</label>
			</div>
			@endforeach

		@endif
		
		</div>


		@if($errors->has($param))<span class="form-error is-visible">* {{$errors->first($param)}}</span>@endif
	@elseif($type == 'select')

		<?php $options = $select['options']; $key = $options['key']; $title = $options['title']; $data = $options['data']; $default = $select['default']??''; ?>
		<select name="{{$name}}" id="{{$id?? ''}}" class="test">
			@if($default)
			<option value="{{$default['value']}}">{{$default['title']}}</option>
			@endif
			@foreach($data as $item)
			<option value="{{$item->$key}}" {{$value == $item->$key? 'selected': ''}}>{{$item->$title}}</option>
			@endforeach
		</select>
		
		@if($errors->has($name))<span class="form-error is-visible">* {{$errors->first($name)}}</span>@endif
	@else
		<input 
			id="{{$id ??''}}" 
			class="{{$class?? ''}}" 
			name="{{$name}}" 
			type="{{$type?? 'text'}}" 
			value="{{$value??old($name) }}" 
			placeholder="{{$placeholder?? ''}}" 
			{{$autofocus??''}}>
		@if($errors->has($name))<span class="form-error is-visible">* {{$errors->first($name)}}</span>@endif
	@endif
	</td>
</tr>