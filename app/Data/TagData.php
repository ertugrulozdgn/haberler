<?php

namespace App\Data;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagData
{
    public static function get($slug): ?Tag 
    {
       return Cache::tags('tags')->remember('tag_' . $slug, 360, function () use ($slug) {
            return Tag::whereSlug($slug)->first();
       });
    }
}