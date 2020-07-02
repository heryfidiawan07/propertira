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

Route::get('/page', function () {
    return view('user.page.index');
});

Route::get('/product/create', function () {
    return view('admin.product.create');
});

Route::get('/blog/create', function () {
    return view('admin.blog.create');
});

Route::get('/page/create', function () {
    return view('admin.page.create');
});
