<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    $user = new App\User();
    $user->username = "fadhilimamk";
    $user->password = "rahasia";

    Auth::login($user);

    return redirect()->intended('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
