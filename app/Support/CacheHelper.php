<?php

namespace App\Support;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function posts(Post $post)
    {
        Cache::tags('posts')->flush();
    }
}