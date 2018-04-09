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

/*Route::get('/', function (){
	return view('layouts.master');
});*/
Route::get('images/get/{filename}', 'ImagesController@get');

Route::prefix('admin')->middleware('auth')->group(function() {
	Route::get('', 'Admin\IndexController@index');
	Route::resource('articles', 'Admin\ArticlesController');
	Route::post('articles/{id}', 'Admin\ArticlesController@update');
	Route::get('articles/{id}/delete', 'Admin\ArticlesController@destroy');

});

Route::middleware('sidebar')->group(function() {
	
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/article/{uri}', 'ArticlesController@view');
Route::post('/article/comments', 'CommentsController@store');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/view/{id}', 'BlogController@view');
});

Route::prefix('admin')->group(function() {
Auth::routes();
});
