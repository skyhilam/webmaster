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
Breadcrumbs::register('postTypes', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.post_types'), url('/postTypes'));
});

// Types > info
Breadcrumbs::register('postTypes/info', function($breadcrumbs, $type)
{
	$breadcrumbs->parent('postTypes');
    $breadcrumbs->push($type->title, url('/postTypes/info/'. $type->id));
});

// Type > info > edit
Breadcrumbs::register('postTypes/edit', function($breadcrumbs, $type)
{
	$breadcrumbs->parent('postTypes/info', $type);
    $breadcrumbs->push(trans('layout.'. request()->param));
});

// Type > create
Breadcrumbs::register('postTypes/create', function($breadcrumbs)
{
	$breadcrumbs->parent('postTypes');
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


// Messages
Breadcrumbs::register('messages', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.messages'), url('/messages'));
});

// Messages > create
Breadcrumbs::register('messages/compose', function($breadcrumbs)
{
	$breadcrumbs->parent('messages');
	$breadcrumbs->push(trans("layout.compose"));
});

// Messages > info
Breadcrumbs::register('messages/info', function($breadcrumbs, $subject)
{
	$breadcrumbs->parent('messages');
	$breadcrumbs->push($subject);
});



// Navigations
Breadcrumbs::register('navigations', function($breadcrumbs)
{
	$breadcrumbs->push(trans('layout.navigations'), url('/navigations'));
});

// Navigations > create
Breadcrumbs::register('navigations/create', function($breadcrumbs)
{
	$breadcrumbs->parent('navigations');
	$breadcrumbs->push(trans('layout.create'));
});

// Navigations > info
Breadcrumbs::register('navigations/info', function($breadcrumbs, $item)
{
	$breadcrumbs->parent('navigations');
	$breadcrumbs->push(trans('layout.'.$item->title), url('/navigations/info/'. $item->id));
});

// Navigations > edit
Breadcrumbs::register('navigations/edit', function($breadcrumbs, $item)
{
	$breadcrumbs->parent('navigations/info', $item);
	$breadcrumbs->push(trans('layout.'. request()->param));
});














