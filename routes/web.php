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
    return view('welcome');
});

//USERS
Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}/go_rest', 'UserController@show_gorestid');
Route::post('/users', 'UserController@store');
Route::get('/users_sync', 'UserController@sync');

//POSTS
Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{id}/comments', 'PostController@index_comments');

//COMMENTS
Route::get('/comments', 'CommentController@index');
Route::post('/comments', 'CommentController@store');
Route::post('/comments/first', 'CommentController@store_first_post');
Route::delete('/comments/{id}', 'CommentController@destroy');
