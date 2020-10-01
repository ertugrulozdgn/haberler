<?php

namespace App\Data;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryData
{
    public static function get($slug): ?Category
    {
        return Cache::tags('categories')->rememberForever('category_' . $slug, function () use ($slug) {
            return Category::active()->whereSlug($slug)->first();
        });
    }

    public static function menu(): Collection
    {
        return Cache::tags('categories')->rememberForever('menu', function () {
            return Category::active()->where('show_in_menu', 1)->get();
        });
    }

    public static function sidemenu(): Collection
    {
        return Cache::tags('categories')->rememberForever('sidemenu', function () {
            return Category::active()->get();
        });
    }
}