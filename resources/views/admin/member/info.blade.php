@extends('layouts.admin.info_form', ['breadcrumb' => 'members/info', 'item' => $user])


@section('form')
	
	<?php 
		$trs = [
			[
				'label' => trans('layout.email'), 
				'value' => $user->email
			],
			[
				'label' => trans('layout.role'), 
				'value' => trans('layout.'.$user->role->slug), 
				'url' => url('/members/edit/'. $user->public_id. '/role')
			],
			[
				'label' => trans('layout.name'), 
				'value' => $user->name, 
				'url' => url('/members/edit/'. $user->public_id. '/name')
			],
			[
				'label' => trans('layout.password'), 
				'value' => '****************', 
				'url' => url('/members/edit/'. $user->public_id. '/password')
			]
		];
	 ?>

	@foreach($trs as $tr)
		@include('admin.table.tr', $tr)
	@endforeach
	

@endsection

