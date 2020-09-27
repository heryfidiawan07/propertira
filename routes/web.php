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


// ADMIN

Route::get('/product/create', function () {
	$edit = false;
    return view('admin.product.form', compact('edit'));
});

Route::get('/blog/create', function () {
	$edit = false;
    return view('admin.blog.form', compact('edit'));
});

Route::get('/page/create', function () {
    return view('admin.page.create');
});


Route::get('admin/user', 'UserCOntroller@index')->name('admin.user.index');
