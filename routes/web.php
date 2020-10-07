<?php

Route::get('/', 'VisitorController@welcome')->name('visitor.welcome');
Route::get('property/{search?}', 'VisitorController@search')->name('property.search');

Route::get('page/{slug}', 'PageController@show')->name('page.show');
Route::get('property/detail/{slug}', 'PropertyController@show')->name('property.show');
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
    Route::resource('property', PropertyController::class, ['except' => 'show']);
    Route::resource('blog', BlogController::class, ['except' => 'show']);
    Route::resource('promo', PromoController::class, ['except' => 'show']);
    Route::resource('area', AreaController::class, ['except' => 'show']);
    Route::resource('category', CategoryController::class, ['except' => 'show']);
    Route::resource('setting', SettingController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::get('destroy-media-property/{id}', 'MediaController@destroyProperty')->name('media.destroyProperty');
    Route::post('setting/icon', 'SettingController@icon')->name('setting.icon');
    Route::post('setting/logo', 'SettingController@logo')->name('setting.logo');
    Route::post('socialMedia', 'SettingController@socialMedia')->name('setting.socialMedia');
    Route::post('socialMediaActivated', 'SettingController@socialMediaActivated')->name('setting.socialMediaActivated');
    Route::post('share', 'SettingController@share')->name('setting.share');
    Route::post('shareActivated', 'SettingController@shareActivated')->name('setting.shareActivated');

    Route::get('softDeleteSocial', 'SettingController@softDeleteSocial')->name('setting.softDeleteSocial');
    Route::get('softDeleteShare', 'SettingController@softDeleteShare')->name('setting.softDeleteShare');
});

