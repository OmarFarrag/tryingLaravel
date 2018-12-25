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

Route::resource('post','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}/recommend','PostsController@recommend');

Route::get('/categories', 'CategoriesController@showCategories')->name('categories');

Route::get('search','PostsController@search')->name('search');

Route::post('/post/{id}/addcomment','PostsController@addComment');

Route::get('/community','CommunityController@exploreAuthors')->name('community');

Route::get('/follow/{id}','CommunityController@follow');

Route::get('/community/{id}','CommunityController@showProfile');