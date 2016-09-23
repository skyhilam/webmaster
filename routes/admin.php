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

		Route::get('/name/{name}', 'SettingController@showSettingName');
		Route::patch('/name', 'SettingController@changeName');

		Route::get('/password', 'SettingController@showSettingPassword');
		Route::patch('/password', 'SettingController@changePassword');
	});

});

// for admin and redac
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'redac']], function() {
	Route::get('/posts', 'PostController@get');
	Route::get('/post/create', 'CreateNewPostController@get');
	Route::post('/post/create', 'CreateNewPostController@post');

	Route::get('/post/details/{id}', 'PostDetailsController@get');
	Route::post('/post/details/{id}', 'PostDetailsController@post');
	Route::delete('/post/details/{id}', 'PostDetailsController@delete');
});

// for admin
Route::group(['namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function() {
	Route::get('/wiki', function() {return view('admin.wiki');});
	Route::get('/problems', function() {return view('admin.problems');});
	ROute::get('/constructor', function() {return view('admin.constructor');});




	Route::get('/messages/inbox', 'MessageController@get');

	Route::get('/analytics', 'AnalyticsController@get');

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





