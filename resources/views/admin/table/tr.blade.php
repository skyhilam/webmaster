<tr>
	<td class="text-center" width="150"><p >{{$label}}</p></td>
	@if(isset($url))
	<td><a href="{{$url}}"><p>{{$value}}</p></a></td>
	@else
	<td><p>{{$value}}</p></td>
	@endif
</tr>