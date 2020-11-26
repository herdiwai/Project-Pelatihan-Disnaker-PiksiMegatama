<?php

use Illuminate\Support\Facades\{Route,Auth};





// Route::get('/', function () {
//     return view('login');
// })->middleware('guest');

Route::get('/','Auth\LoginController@showLoginForm');


Route::get('/user','DashboardController@show')->middleware('auth');
Route::get('/create','DashboardController@create')->name('create');
Route::post('/store','DashboardController@store')->name('store');

Route::get('/home','FrontendController@show');
Route::get('/about','FrontendController@about');
Route::get('/contact','FrontendController@contact');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/logout','Auth\LoginController@logout')->name('logout');

//Category Route
Route::get('/category', 'CategoryController@index')->name('category');

Route::get('/category/store', 'CategoryController@create')->name('category.create');
Route::post('/category/create', 'CategoryController@store')->name('category.store');

Route::get('/category/edit/{category}', 'CategoryController@edit')->name('category.edit');
Route::PUT('/category/category/{category}', 'CategoryController@Update')->name('category.update');

Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

// POST 
Route::resource('blog', 'BlogController');
