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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'w', 'namespace' => 'Wx'], function(){
	
	Route::get('/', 'MainController@checkSignature');

	Route::get('/t', 'MainController@test');

	Route::group(['prefix'=>'menu'], function(){

		Route::get('/create', 'MenuController@create');

		Route::get('/get', 'MenuController@get');

		Route::get('/delete', 'MenuController@delete');


	});
});

