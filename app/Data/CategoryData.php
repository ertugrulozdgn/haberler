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

    public static function menu($show_in_menu = null): Collection
    {
        return Cache::tags('categories')->rememberForever('menu_' . $show_in_menu, function () use ($show_in_menu) {
            $query = Category::active();
            
            if (!empty($show_in_menu)) {
                $query->where('show_in_menu', $show_in_menu);
            }
            
            return $query->get();
        });
    }
}