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
	
	Route::get('/', function(Illuminate\Http\Request $request, App\Models\Wx\Base $modelWx){
		$modelWx->checkSignature($request->all());
	});

	Route::group(['prefix'=>'receive'], function(){

		Route::post('/subscribe', 'ReceiveController@subscribe');

		Route::get('/cancel', 'ReceiveController@cancel');
	});

	Route::group(['prefix'=>'menu', 'middleware'=>'wx.access_token'], function(){

		Route::get('/create', 'MenuController@create');

		Route::get('/get', 'MenuController@get');

		Route::get('/delete', 'MenuController@delete');


	});
});

