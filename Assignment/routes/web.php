<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('threads', 'ThreadsController@index');
Route::get('threads/{thread}', 'ThreadsController@open');
Route::get('threads/{thread}/edit', 'ThreadsController@editThread')->middleware('auth');
Route::get('threads/{thread}/replies/{reply}/edit', 'ThreadsController@editReply')->middleware('auth');

Route::post('threads/add', 'ThreadsController@addThread');
Route::post('threads/{thread}/replies', 'ThreadsController@addReply');

Route::patch('threads/{thread}/update', 'ThreadsController@updateThread');
Route::patch('threads/{thread}/replies/{reply}', 'ThreadsController@updateReply');
