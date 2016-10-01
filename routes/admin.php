<?php 


Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function() {
	Route::get('/login', 'LoginController@showLoginForm');
	Route::post('/login', 'LoginController@login');

	

	Route::get('/password/forgot', 'ForgotPasswordController@showLinkRequestForm');
	Route::post('/password/forgot', 'ForgotPasswordController@sendResetLinkEmail');

	Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm');
	Route::post('/password/reset', 'ResetPasswordController@reset');

	// Route::get('/register', 'RegisterController@showRegistrationForm');
	// Route::post('/register', 'RegisterController@register');
});


// for all
Route::group(['middleware' => ['auth']], function() {
	Route::get('/', 'Admin\DashboardController@get');

	Route::get('/logout', 'Auth\LoginController@logout');


	Route::group(['prefix' => '/setting', 'namespace' => 'Admin'], function() {
		Route::get('/', 'SettingController@showSetting');

		Route::get('{param}', 'SettingController@showEditForm');
		Route::patch('{param}', 'SettingController@save');
	});

});

// for admin and redac
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'redac']], function() {
	// posts
	Route::get('/posts', 'PostController@get');
	Route::get('/post/create', 'PostController@showCreateForm');
	Route::post('/post/create', 'PostController@create');
	Route::get('/post/info/{id}', 'PostController@showInfo');
	Route::delete('/post/info/{id}', 'PostController@delete');

	Route::get('/post/edit/{id}/{param}', 'PostController@showEditForm');
	Route::patch('/post/edit/{id}/{param}', 'PostController@edit');

	// post types
	Route::get('/post/types', 'TypesController@index');
	Route::get('/post/type/create', 'TypesController@showCreateForm');
	Route::post('/post/type/create', 'TypesController@create');
	Route::get('/post/type/edit/{id}/{param}', 'TypesController@showEditForm');
	Route::patch('/post/type/edit/{id}/{param}', 'TypesController@edit');
	Route::delete('/post/type/edit/{id}/{param}', 'TypesController@delete');

	// analytics
	Route::get('/analytics', 'AnalyticsController@get');
});

// for admin
Route::group(['namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function() {
	Route::get('/wiki', function() {return view('admin.wiki');});
	Route::get('/problems', function() {return view('admin.problems');});
	ROute::get('/constructor', function() {return view('admin.constructor');});
	ROute::get('/jobs', function() {return view('admin.jobs');});




	Route::get('/messages/inbox', 'MessageController@get');

	

	Route::get('/roles', 'RoleController@get');

	Route::get('/members', 'MemberController@get');
	Route::get('/member/create', 'MemberController@showCreateForm');
	Route::post('/member/create', 'MemberController@register');

	Route::get('/member/info/{id}', 'MemberController@showInfo');

	Route::group(['prefix' => '/member/edit'], function() {
		Route::get('/name/{id}', 'MemberController@showEditNameForm');
		Route::get('/role/{id}', 'MemberController@showEditRoleForm');
		Route::get('/password/{id}', 'MemberController@showEditPasswordForm');

		Route::patch('/{param}/{id}', 'MemberController@changeParam');

		// Route::put('/member/edit/{id}', 'MemberController@changeInfo');
		// Route::patch('/member/edit/{id}', 'MemberController@changePassword');
	});

	Route::delete('/member/delete/{id}', 'MemberController@delete');

	

});








Route::get('/message', 'MessageController@showMessageForm');
Route::post('/message', 'MessageController@send');





