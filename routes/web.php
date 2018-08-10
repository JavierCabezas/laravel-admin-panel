<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

setlocale(LC_ALL, "");
setlocale(LC_ALL, app()->getLocale());


Route::get('/', function () {
    return redirect()->route('admin::login.form');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {

  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');
  Route::post('/login', 'Auth\LoginController@login')->name('login');
  Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

  Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('/users', 'UserController', ['except' => ['show']]);
    Route::resource('/roles', 'RoleController', ['except' => ['show']]);
    Route::resource('/permissions', 'PermissionController', ['except' => ['show']]);

    Route::get('/roles/slug/{name}', 'RoleController@slug')->name('roles.slug');

  });

});
