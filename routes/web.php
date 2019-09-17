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

/* localhost/myproject/public/ */
Route::get('/', function () {
    return view('home'); //resources/views/welcome.blade.php
});

Route::get('/signin', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register.register');
});

Route::post('/register_action', 'RegisterController@store');

Route::post('/login_check', 'RegisterController@login');

Route::get('/logout', function (){
	Auth::logout();

	return Redirect::to('');

})->middleware("auth");
/* localhost/myproject/public/home 
Route::get('/home', function () {
    return view('home'); //resources/views/home.blade.php
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/