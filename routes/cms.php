<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('routes.domains.cms'),
    'namespace' => config('routes.namespaces.cms')
], function () {

    Auth::routes();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'DashboardController@index');
        Route::resource('user','Admin\UserController');
        Route::resource('category', 'Admin\CategoryController');
        Route::resource('page','Admin\PageController');
        Route::resource('news', 'Post\NewsController');
        Route::get('sorting', 'Post\PostSortingController@index');
        Route::post('sorting/update-location', 'Post\PostSortingController@sort');
        Route::resource('setting','Admin\SettingController');
    });
});

