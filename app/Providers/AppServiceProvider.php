<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('settings', Setting::pluck('value', 'key')->all());
        Post::observe(PostObserver::class);
    }
}
