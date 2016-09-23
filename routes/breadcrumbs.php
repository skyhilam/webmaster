<?php 

use Illuminate\Http\Request;

// Members
Breadcrumbs::register('members', function($breadcrumbs)
{
    $breadcrumbs->push(trans('layout.members'), url('/members'));
});

// Members > create
Breadcrumbs::register('member/create', function($breadcrumbs)
{
	$breadcrumbs->parent('members');
    $breadcrumbs->push(trans('layout.create_new'));
});

// Members > info
Breadcrumbs::register('members/info', function($breadcrumbs)
{
	$breadcrumbs->parent('members');
    $breadcrumbs->push(trans('layout.personal'), url('/member/info/'. request()->id));
});


// Members > info > name
Breadcrumbs::register('members/edit/name', function($breadcrumbs)
{
	$breadcrumbs->parent('members/info');
    $breadcrumbs->push(trans('layout.name'));
});

// Members > info > role
Breadcrumbs::register('members/edit/role', function($breadcrumbs)
{
	$breadcrumbs->parent('members/info');
    $breadcrumbs->push(trans('layout.role'));
});

// Members > info > password
Breadcrumbs::register('members/edit/password', function($breadcrumbs)
{
	$breadcrumbs->parent('members/info');
    $breadcrumbs->push(trans('layout.password'));
});


// Setting
Breadcrumbs::register('setting', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.setting'), url('/setting'));
});

// Setting > name
Breadcrumbs::register('setting/name', function($breadcrumbs)
{
	$breadcrumbs->parent('setting');
    $breadcrumbs->push(trans('layout.name'));
});

// Setting > password
Breadcrumbs::register('setting/password', function($breadcrumbs)
{
	$breadcrumbs->parent('setting');
    $breadcrumbs->push(trans('layout.password'));
});

