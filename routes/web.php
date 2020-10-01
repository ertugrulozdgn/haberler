<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('routes.domains.web'),
    'namespace' => config('routes.namespaces.web')
], function () {

    // home
    Route::get('/', 'HomeController@index');

    // page
    Route::get('/{slug}-sayfasi', 'PageController@show')->where('slug', '[a-z-]+');

    // content(news) detail
    Route::get('/{slug}-{id}', 'Post\PostController@show')->where([
        'slug' => '[a-zA-Z-0-9-]+',
        'id' => '[0-9]+'
    ]);

    // tag
    Route::get('/etiket/{slug}', 'Post\PostController@tag')->where('slug', '[a-z0-9-]+');

    // category
    Route::get('/{slug}', 'Post\NewsController@index')->where('slug', '[a-z0-9-]+');

});




