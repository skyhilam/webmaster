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
	Route::get('/', 'Admin\DashboardController@index');
	
	Route::get('/logout', 'Auth\LoginController@logout');


	Route::group(['prefix' => '/setting', 'namespace' => 'Admin'], function() {
		Route::get('/', 'SettingController@showInfo');

		Route::get('{param}', 'SettingController@showEditForm');
		Route::patch('{param}', 'SettingController@submitEditForm');
	});

	Route::group(['prefix' => '/messages', 'namespace' => 'Admin'], function() {
		Route::get('/', 'MessageController@index');
		Route::get('/compose', 'MessageController@showCreateForm');
		Route::post('/compose', 'MessageController@send');

		Route::get('/info/{id}', 'MessageController@showInfo');
		Route::delete('/info/{id}', 'MessageController@delete');
	});

});

// for admin and redac
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'redac']], function() {
	

	// analytics
	Route::get('/analytics', 'AnalyticsController@get');
});

// for admin
Route::group(['namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function() {
	Route::get('/jobs', function() {return view('admin.jobs');});
	Route::get('/program_log', function() {return view('admin.program_log');});



	Route::group(['prefix' => '/home'], function() {
		Route::get('/', 'Pages\HomeController@index');
		Route::post('/', 'Pages\HomeController@uploadImage');
		Route::delete('/delete/{id}', 'Pages\HomeController@deleteItem');

	});

	Route::group(['prefix' => '/about'], function() {
		Route::get('/', 'Pages\AboutController@index');
	});

	Route::group(['prefix' => '/contact'], function() {
		Route::get('/', 'Pages\ContactController@index');
	});
	

	

	


	Route::group(['prefix' => '/members'], function() {
		Route::get('/', 'MemberController@index');

		Route::get('/create', 'MemberController@showCreateForm');
		Route::post('/create', 'MemberController@submitCreateForm');

		Route::get('/info/{id}', 'MemberController@showInfo');
		Route::delete('/info/{id}', 'MemberController@delete');

		Route::get('/edit/{id}/{param}', 'MemberController@showEditForm');
		Route::patch('/edit/{id}/{param}', 'MemberController@submitEditForm');
		
	});


	


	

});













