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

        Route::get('deneme', function () {
            return view('cms.deneme4');
        });
    });

    Route::get('ertu', function() {
        echo asset('/storage/file/images/2020/09/14/deneme_cover_img_5f5f1c46eb57b.jpg');
    });
});

