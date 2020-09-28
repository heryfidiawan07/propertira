<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('page/{slug}', 'PageController@show')->name('page.show');
Route::get('product/detail/{slug}', 'ProductController@show')->name('product.show');
Route::get('product/{filter}', 'VisitorController@show')->name('visitor.show');
Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');


Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');

// ADMIN

Route::prefix('admin')->group(function () {
	Route::resource('dashboard', DashboardController::class);
    Route::resource('page', PageController::class);
    Route::resource('product', ProductController::class);
    Route::resource('blog', BlogController::class);
});

