<?php

namespace App\Data;

use App\Models\Category;;
use Illuminate\Support\Collection;

class CategoryData
{
    public static function slug($slug): ?Category
    {
        $categories = Category::active()->whereSlug($slug)->first();

        return $categories;
    }
}