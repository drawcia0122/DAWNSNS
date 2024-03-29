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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search')->name('users.search');
Route::post('/search','UsersController@search');



Route::post('/tweet','PostsController@tweet');

Route::post('/post/update','PostsController@update');

Route::get('/post/{id}/delete','PostsController@delete');

Route::get('/{id}/follow','UsersController@follow');
Route::get('/{id}/unfollow','UsersController@unfollow');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

Route::get('/profile/{id}','UsersController@profile');

Route::get('/mypage','UsersController@mypage');
Route::post('/profileUpdate','UsersController@profileUpdate');

Route::get('/logout','Auth\LoginController@logout');




Route::get('test','UsersController@test');
