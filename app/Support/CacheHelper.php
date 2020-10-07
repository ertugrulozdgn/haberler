<?php

namespace App\Support;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function posts(Post $post)
    {
        Cache::tags('posts')->flush();

        Cache::forget('post_' . $post->id);

        Cache::tags('sortings')->flush();

        if (!empty($post->categories)) {
            foreach ($post->categories as $category) {
                Cache::tags('post_category' . $category)->flush();
            }
        }

        if (!empty($post->tags)) {
            foreach ($post->tags as $tag) {
                Cache::tags('tag_post' . $tag)->flush();
            }
        }
    }
}