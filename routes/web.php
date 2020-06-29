<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/detail', function () {
    return view('user.detail.index');
});
