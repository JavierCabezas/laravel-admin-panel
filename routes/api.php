<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'public'], function ($router) {

});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function ($router) {

    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => 'jwt.auth'], function ($router) {

      Route::get('/', function () {
          return response()->json([
            'Hello' => 'World',
          ]);
      });

    });

});
