<?php

namespace App\Data;

use App\Models\Category;

class CategoryData
{
    public static function slug($slug)
    {
        $categories = Category::active()->whereSlug($slug)->first();

        return $categories;
    }
}