<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('routes.domains.web'),
    'namespace' => config('routes.namespaces.web')
], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/{slug}-{id}', 'Post\PostController@show')->where([
        'slug' => '[a-zA-Z-0-9-]+',
        'id' => '[0-9]+'
    ]);

    Route::get('/tag', 'Post\PostController@tag');

    Route::get('/category', 'Post\NewsController@index');


    Route::get('/deneme', function() {
        return view('web.deneme');
    });
});

