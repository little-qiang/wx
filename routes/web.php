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


Route::group(['prefix'=>'w', 'namespace' => 'Wx', 'middleware'=>'wx.access_token'], function(){
	
	Route::get('/', function(Illuminate\Http\Request $request, App\Models\Wx\Base $modelWx){
		$modelWx->checkSignature($request->all());
	});

	Route::post('/', 'MsgController@response');

	Route::get('/t', function(Illuminate\Http\Request $request){
		dd($request->session()->get('wx_tokeninfo'));
	});

	Route::group(['prefix'=>'menu'], function(){

		Route::get('/create', 'MenuController@create');

		Route::get('/get', 'MenuController@get');

		Route::get('/delete', 'MenuController@delete');


	});

	Route::group(['prefix'=>'material'], function(){

		Route::get('/add', 'MaterialController@add');

		Route::get('/get', 'MaterialController@get');

		Route::get('/list', 'MaterialController@list');
	});
});

