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
    return redirect()->route('login');
});

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'news'], function(){
		
		Route::get('detail/{id}',[
			'as'=>'detail',
			'uses'=>'News\NewsController@getDetail'
		]);
	
		Route::get('/',[
			'as'=>'manageNews',
			'uses'=>'News\NewsController@getManageNews'
		]);
	
		Route::get('create',[
			'as'=>'createNews',
			'uses'=>'News\NewsController@getCreateNews'
		]);
	
		Route::post('create',[
			'as'=>'createNews',
			'uses'=>'News\NewsController@postCreateNews'
		]);

		Route::get('edit/{id}',[
			'as'=>'editNews',
			'uses'=>'News\NewsController@getEditNews'
		]);
	
		Route::post('edit/{id}',[
			'as'=>'editNews',
			'uses'=>'News\NewsController@postEditNews'
		]);

		Route::get('delete/{id}',[
			'as'=>'deleteNews',
			'uses'=>'News\NewsController@getDeleteNews'
		]);
	});

	Route::resource('users', 'User\UserManagerController');
});

Auth::routes();
Route::get('/admin', 'HomeController@index')->name('home');
