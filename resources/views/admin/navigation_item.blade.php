<?php 
	// level: 1 user, 2 redac, 3 admin, 4 super
	switch (session()->get('statut')) {
		case 'super':
			$level = 4;
			break;
		case 'admin':
			$level = 3;
			break;
		case 'redac':
			$level = 2;
			break;
		default:
			$level = 1;
			break;
	}
 ?>


@if($level >= $permission)
<li {{classActiveSegment(1, ltrim($url, '/'))}}>
    <a href="{{$url}}">
        <span class="{{$icon}} bookmark text-center" style="{{$icon != 'icon-mail'?: 'font-size: 14px'}}"></span>{{$trans?trans($title): $title}}<span class="icon-arrow float-right"></span>
    </a>
</li>
@endif