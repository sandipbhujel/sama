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

// Route::get('/', function () {
//     return view('front.index', ['name' => 'Birat']);
// });
Route::get('/','frontController@index');

Route::get('/about','frontController@about');
Route::get('/contact','frontController@contact');

Auth::routes();
Route::get('/dashboard','dashboardController@index');
Route::resource('categories','categoriesController');
Route::resource('posts','postsController');