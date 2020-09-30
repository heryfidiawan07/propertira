<?php

Route::get('/', 'VisitorController@welcome')->name('visitor.welcome');
Route::get('product/{search?}', 'VisitorController@search')->name('product.search');

Route::get('page/{slug}', 'PageController@show')->name('page.show');
Route::get('product/detail/{slug}', 'ProductController@show')->name('product.show');
Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

// OPTION
Route::get('promo/{slug}', 'PromoController@show')->name('promo.show');
Route::get('area/{slug}', 'AreaController@show')->name('area.show');
Route::get('category/{slug}', 'CategoryController@show')->name('category.show');


Auth::routes(['register' => false]);

// ADMIN
Route::prefix('admin')->group(function () {
	Route::resource('dashboard', DashboardController::class);
    Route::resource('page', PageController::class, ['except' => 'show']);
    Route::resource('product', ProductController::class, ['except' => 'show']);
    Route::resource('blog', BlogController::class, ['except' => 'show']);
    Route::resource('promo', PromoController::class, ['except' => 'show']);
    Route::resource('area', AreaController::class, ['except' => 'show']);
    Route::resource('category', CategoryController::class, ['except' => 'show']);
    Route::resource('setting', SettingController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
});

