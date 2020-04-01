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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'postController@index')->name('post');
Route::get('/post/{slug}', 'postController@details')->name('post.details');
Route::post('/post/{slug}/comment', 'postController@comments')->name('post.comment');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/','Admin\PostController@index')->name('admin.post');
    Route::get('/edit/{id}','Admin\PostController@edit')->name('admin.post.edit');
    Route::post('/edit/{id}','Admin\PostController@submit')->name('admin.post.submit');
    Route::get('/comments/{id}','Admin\PostController@comments')->name('admin.post.comments');
    Route::get('/comments/{id}/{status}','Admin\PostController@changeStatus')->name('admin.post.change_comment_status');
});

