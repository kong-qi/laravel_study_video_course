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

/*Route::get('/', 'IndexController@index')->name('index');

Route::post('post/', 'IndexController@post')->name('post');

Route::get('/db', 'DbController@index')->name('db');
Route::get('/home', 'IndexController@home')->name('home');*/

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::resource('article','ArticleController');

Route::post('/comment/create', 'CommentController@store')->middleware('auth')->name('comment.store');
