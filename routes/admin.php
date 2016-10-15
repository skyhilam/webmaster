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
	Route::get('/dashboard', 'Admin\DashboardController@index');
	
	Route::get('/logout', 'Auth\LoginController@logout');


	Route::group(['prefix' => '/setting', 'namespace' => 'Admin'], function() {
		Route::get('/', 'SettingController@showInfo');

		Route::get('{param}', 'SettingController@showEditForm');
		Route::patch('{param}', 'SettingController@submitEditForm');
	});

	Route::group(['prefix' => '/messages'], function() {
		Route::get('/', 'MessageController@index');
		Route::get('/compose', 'MessageController@showCreateForm');
		Route::post('/compose', 'MessageController@send');

		Route::get('/info/{id}', 'MessageController@showInfo');
		Route::delete('/info/{id}', 'MessageController@delete');
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
	Route::group(['prefix' => '/postTypes'], function() {
		Route::get('/', 'TypesController@index');
		Route::get('/info/{id}', 'TypesController@showInfo');
		Route::delete('/info/{id}', 'TypesController@delete');
		Route::get('/create', 'TypesController@showCreateForm');
		Route::post('/create', 'TypesController@create');
		Route::get('/edit/{id}/{param}', 'TypesController@showEditForm');
		Route::patch('/edit/{id}/{param}', 'TypesController@edit');
	});

	// analytics
	Route::get('/analytics', 'AnalyticsController@get');
});

// for admin
Route::group(['namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function() {
	Route::get('/jobs', function() {return view('admin.jobs');});
	Route::get('/program_log', function() {return view('admin.program_log');});



	Route::group(['prefix'=>'/navigations'], function() {
		Route::get('/', 'NavigationController@index');
		Route::get('/create', 'NavigationController@showCreateForm');
		Route::post('/create', 'NavigationController@submitCreateForm');
		Route::get('/info/{id}', 'NavigationController@showInfo');
		Route::delete('/info/{id}', 'NavigationController@deleteInfo');
		Route::get('/edit/{id}/{param}', 'NavigationController@showEditForm');
		Route::patch('/edit/{id}/{param}', 'NavigationController@submitEditForm');
	});

	

	

	Route::get('/roles', 'RoleController@get');

	Route::get('/members', 'MemberController@index');
	Route::get('/member/create', 'MemberController@showCreateForm');
	Route::post('/member/create', 'MemberController@createMember');

	Route::get('/member/info/{id}', 'MemberController@showInfo');

	Route::group(['prefix' => '/member/edit'], function() {

		

		Route::get('/{param}/{id}', 'MemberController@showEditForm');
		Route::patch('/{param}/{id}', 'MemberController@edit');

		// Route::put('/member/edit/{id}', 'MemberController@changeInfo');
		// Route::patch('/member/edit/{id}', 'MemberController@changePassword');
	});

	Route::delete('/member/delete/{id}', 'MemberController@delete');

	

});













