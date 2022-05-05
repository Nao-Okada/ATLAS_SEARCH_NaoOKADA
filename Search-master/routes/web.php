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

//page of logging out
Route::get('/login', 'Auth\login\LoginController@login')->name('login');
Route::post('/login', 'Auth\login\LoginController@login');

Route::get('/register', 'Auth\Register\RegisterController@register');
Route::post('/register', 'Auth\Register\RegisterController@register');

Route::get('/added', 'Auth\Register\RegisterController@added');
