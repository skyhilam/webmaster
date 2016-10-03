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
    $breadcrumbs->push(trans('layout.create_member'));
});

// Members > info
Breadcrumbs::register('member/info', function($breadcrumbs, $user)
{
	$breadcrumbs->parent('members');
    $breadcrumbs->push($user->name, url('/member/info/'. $user->public_id));
});


// Members > edit
Breadcrumbs::register('member/edit', function($breadcrumbs, $user)
{
	$breadcrumbs->parent('member/info', $user);
    $breadcrumbs->push(trans('layout.'. request()->param));
});



// Setting
Breadcrumbs::register('setting', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.setting'), url('/setting'));
});

// Setting > name
Breadcrumbs::register('setting/edit', function($breadcrumbs)
{
	$breadcrumbs->parent('setting');
    $breadcrumbs->push(trans('layout.'.request()->param));
});



// Types
Breadcrumbs::register('post/types', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.post_types'), url('/post/types'));
});

// Type > edit
Breadcrumbs::register('post/type/edit', function($breadcrumbs)
{
	$breadcrumbs->parent('post/types');
    $breadcrumbs->push(trans('layout.'. request()->param));
});

// Type > create
Breadcrumbs::register('post/type/create', function($breadcrumbs)
{
	$breadcrumbs->parent('post/types');
    $breadcrumbs->push(trans('layout.create'));
});


// Posts
Breadcrumbs::register('posts', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.posts'), url('/posts'));
});

// Posts > create
Breadcrumbs::register('post/create', function($breadcrumbs)
{
	$breadcrumbs->parent('posts');
    $breadcrumbs->push(trans('layout.create'));
});

// Posts > details
Breadcrumbs::register('post/details', function($breadcrumbs)
{
	$breadcrumbs->parent('posts');
	$breadcrumbs->push(trans('layout.edit'));
});


// Posts > info
Breadcrumbs::register('post/info', function($breadcrumbs)
{
	$breadcrumbs->parent('posts');
	$breadcrumbs->push(trans('layout.info'), url('/post/info/'. request()->id));
});

// Posts > id > title
Breadcrumbs::register('post/edit', function($breadcrumbs)
{
	$breadcrumbs->parent('post/info');
	$breadcrumbs->push(trans("layout.". request()->param));
});

// Analytics
Breadcrumbs::register('analytics', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.analytics'), url('/analytics'));
});