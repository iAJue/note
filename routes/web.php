<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::group(['middleware' => ['check.login']], function () {
    Route::get('/web/{id?}', 'HomeController@web');
    Route::get('/users/{id?}', 'UserController@users');
});



Route::get('/logout', 'UserController@logout');
Route::post('/login', 'UserController@login');
Route::post('/send', 'UserController@send');
Route::post('/reg', 'UserController@reg');
Route::post('/reset_send', 'UserController@reset_send');
Route::post('/reset', 'UserController@reset');

Route::group(['middleware' => ['check.login', 'home.login']], function () {

    Route::get('/note/{id?}', 'HomeController@note');
    Route::get('/markdown/{id?}', 'HomeController@markdown');

    Route::get('/del', 'UserController@del');
    Route::post('/userset', 'UserController@userset');
    Route::post('/upload/cover', 'UserController@cover');
    Route::post('/upload/avatar', 'UserController@avatar');

    Route::post('/upload', 'ContentController@upload');
    Route::post('/save', 'ContentController@save');

    Route::post('/api/newly', 'ApiController@newly');
    Route::post('/api/rename', 'ApiController@rename');
    Route::post('/api/del', 'ApiController@del');
    Route::post('/api/delete', 'ApiController@delete');
    Route::post('/api/move', 'ApiController@move');



});
