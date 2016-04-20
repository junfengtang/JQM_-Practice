<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
//查询页面
Route::get('test', 'Test\TestController@index');
//查询返回接口
Route::post('showtrainlist', 'Test\TestController@show');

Route::get('detail', 'Test\TestController@onetrain');

Route::get('detail/{id}', 'Test\TestController@detail');

Route::get('number', 'Test\TestController@number');

Route::post('superfluous', 'Test\TestController@superfluous');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
