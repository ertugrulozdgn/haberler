<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('routes.domains.web'),
    'namespace' => config('routes.namespaces.web')
], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/detail', 'Post\NewsController@show');

    Route::get('/category', 'Post\NewsController@index');


    Route::get('/deneme', function() {
        return view('web.deneme');
    });
});

