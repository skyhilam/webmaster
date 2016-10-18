@extends('layouts.admin.index_form', ['row' => true, 'breadcrumb' => 'home'])


@section('form')

<form action="{{request()->url()}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="file" accept="image/png,image/jpeg,image/jpg" name="image">
	<button type="submit" class="button">sumibt</button>
</form>


<br><br>

<div class="row medium-up-4">
	@foreach($images as $image)
	<div class="column"  >
		
		<img id="image" class="thumbnail" src="{{$image->url}}" data-equalizer-watch>
		
		<form action="{{request()->url()}}/delete/{{$image->public_id}}" method="post" >
			{{csrf_field()}}
			<input type="hidden" value="delete" name="_method">
			<button class="button" type="submit">{{trans('layout.delete')}}</button>
		</form>
	</div>
	@endforeach
</div>






@endsection