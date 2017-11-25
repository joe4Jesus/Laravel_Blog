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
//pages routes
Route::get('blog/{slug}', ['uses'=>'BlogController@getSingle', 'as'=>'blog.single'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'contact']);
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

//post routes
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController', ['except'=>['create']]);
Route::resource('tags', 'TagController', ['except'=>['create']]);

//comments routes
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);


//authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
