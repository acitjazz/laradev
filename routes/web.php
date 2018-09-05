<?php
//BACK END
Route::group(['prefix' => 'backend', 'middleware' => ['web','can:all']], function () {

		Route::get('/', 'Backend\DashboardController@index');
		Route::get('/dashboard', 'Backend\DashboardController@index');
		Route::resource('permission', 'Backend\PermissionController');
		Route::resource('role', 'Backend\RoleController');
		Route::post('role/give-permission', 'Backend\RoleController@givepermission');
		Route::post('role/user-permission', 'Backend\RoleController@usergivepermission');
		Route::post('role/user-role', 'Backend\RoleController@usergiverole');

		//MEDIA 
		Route::post('/destroy-media', 'Backend\MediaController@delete');

		//Member
		Route::get('/user/trash', 'Backend\UserController@trash');
		Route::post('/user/delete', 'Backend\UserController@delete');
		Route::post('/user/{id}/destroy', 'Backend\UserController@destroy');
		Route::post('/user/restore', 'Backend\UserController@restore');
		Route::resource('user', 'Backend\UserController');

		//POST
		Route::get('/post/trash', 'Backend\PostController@trash');
		Route::post('/post/delete', 'Backend\PostController@delete');
		Route::post('/post/{id}/destroy', 'Backend\PostController@destroy');
		Route::post('/post/restore', 'Backend\PostController@restore');
		Route::post('/store-media-post/{id}', 'Backend\PostController@storemedia');
		Route::resource('post', 'Backend\PostController');

		//Category
		Route::get('/category/export/{id}', 'Backend\CategoryController@export');
		Route::get('/category/trash', 'Backend\CategoryController@trash');
		Route::post('/category/delete', 'Backend\CategoryController@delete');
		Route::post('/category/{id}/destroy', 'Backend\CategoryController@destroy');
		Route::post('/category/restore', 'Backend\CategoryController@restore');
		Route::post('/store-media-category/{id}', 'Backend\CategoryController@storemedia');
		Route::resource('category', 'Backend\CategoryController');

		//Option
		Route::resource('option', 'Backend\OptionController');
});
//FRONTEND
Route::group(['middleware' => 'web'], function () {
		Auth::routes();
		Route::get('logout', 'Auth\LoginController@logout');
		//BACKEND LOGIN
		Route::get('/backend/login', 'Auth\LoginController@showLoginForm');
		//SOCIAL LOGIN
		Route::get('/callback/{provider}', 'Frontend\SocialAuthController@handleProviderCallback');
		Route::get('/redirect/{provider}', 'Frontend\SocialAuthController@redirectToProvider');
		//FRONT END
		Route::get('/', 'Frontend\FrontendController@index');
		Route::get('/{locale}', 'Frontend\FrontendController@home');
		//Page
		Route::get('{locale}/page/{slug}', 'Frontend\PageController@view');

		Route::post('update-profile', 'Frontend\UserController@update');
	});

