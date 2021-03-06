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

Route::get('/', [
  'uses' => 'BlogController@index',
  'as' => 'blog'
]);
Route::get('/blog/{post}', [
  'uses' => 'BlogController@show',
  'as' => 'blog.show'
]);
Route::get('/category/{category}', [
  'uses' => 'BlogController@category',
  'as' => 'category'
]);
Route::get('/author/{author}', [
	'uses' => 'BlogController@author',
	'as' => 'author'
]);
Route::get('/tag/{tag}', [
	'uses' => 'BlogController@tag',
	'as' => 'tag'
]);
Route::post('/blog/{post}/comments', [
  'uses' => 'CommentsController@store',
  'as' => 'blog.comments'
]);

Auth::routes();

Route::post('/logout','Auth\LogoutController@logout');

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => 'auth'], function () {
    Route::resource('blog', 'Backend\BlogController');
//		Route::resource('categories', 'Backend\CategoriesController');
//		Route::resource('users', 'Backend\UsersController');
});

Route::put('/backend/blog/restore/{blog}', [
  'uses' => 'Backend\BlogController@restore',
  'as' => 'backend.blog.restore'
]);
Route::delete('/backend/blog/force-destroy/{blog}', [
  'uses' => 'Backend\BlogController@forceDestroy',
  'as' => 'backend.blog.force-destroy'
]);
