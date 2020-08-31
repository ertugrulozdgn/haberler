<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('routes.domains.cms'),
    'namespace' => config('routes.namespaces.cms')
], function () {
    Route::get('/', 'HomeController@index');
});

