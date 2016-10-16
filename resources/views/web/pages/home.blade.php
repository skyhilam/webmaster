@extends('layouts.web')


@section('content')

<div class="row medium-up-4" id="image-container" data-equalizer>
	@foreach($images as $image)
	<div class="column" >
		<div class="callout" data-equalizer-watch>
			<img id="img" class="thumbnail" data-interchange="[{{$image->mobile_url}}, small],[{{$image->url}}, medium]">
		</div>
	</div>
	@endforeach
</div>



<script>

	$('#image-container').foundation();
	new Foundation.Equalizer($('#image-container'));
</script>
@endsection