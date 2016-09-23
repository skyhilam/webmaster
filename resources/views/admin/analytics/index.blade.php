@extends('layouts.admin')


@section('content')
<br>
<div class="row">
	<div class="column">
		<form action="{{url('/analytics')}}" method="get" >
			<select name="days" id="date-range">
				<option value="0" {{$days == 0? 'selected': ''}}>Today</option>
				<option value="7" {{$days == 7? 'selected': ''}}>Last 7 days</option>
				<option value="30" {{$days == 30? 'selected': ''}}>Last 30 days</option>
				<option value="365" {{$days == 365? 'selected': ''}}>Last 365 days</option>
			</select>
		</form>
	</div>
</div>
<div class="row medium-up-3">
	<div class="column">
		<div class="callout">
			<h4>工作階段</h4>
			<h5><b>{{$summary[0]['sessions']}}</b></h5>
		</div>
	</div>

	<div class="column">
		<div class="callout">
			<h4>使用者</h4>
			<h5><b>{{$summary[0]['users']}}</b></h5>
		</div>
	</div>

	<div class="column">
		<div class="callout">
			<h4>瀏覽量</h4>
			<h5><b>{{$summary[0]['browser']}}</b></h5>
		</div>
	</div>
</div>

@endsection



@section('js')
<script>
$('#date-range').change(function() {
	$(this).parent().submit()
});
</script>

@endsection