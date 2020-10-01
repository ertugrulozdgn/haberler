<?php

namespace App\Data;

use App\Models\Post;
use App\Models\PostSorting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PostData 
{
    public static function get($slug, $id): ?Post // Post || null
    {
        return Cache::remember('post_' . $slug . '_' . $id, 360, function () use ($slug, $id) {
            return Post::with(['categories', 'cover_img', 'tags', 'user'])->active()->whereSlug($slug)->whereId($id)->first();
        });
    }

    public static function list(array $param): Collection //get işlemi olan Collection döner
    {
        $cache_tag = isset($param['cache_tag']) ? $param['cache_tag'] : '';
        $cache_minutes = isset($param['cache_minutes']) ? $param['cache_minutes'] : 60;
        return Cache::tags($cache_tag)->remember(md5(json_encode($param)), $cache_minutes, function () use ($param) {
            $query = Post::with(['categories', 'cover_img', 'user'])->active();

            if(array_key_exists('filters', $param) && !empty($param['filters'])) {  
                foreach($param['filters'] as $key => $value) {                     
                    if($key == 'categories' || $key == 'tags') {
                        $query->whereHas($key, function ($a) use ($value) {
                            $a->whereId($value);
                        });
                    } else {
                        $query->where($key, $value);
                    }
                }
            }

            if(array_key_exists('count', $param)) {
                $query->take($param['count']);
            }

            if (array_key_exists('except', $param)) {
                $query->whereNotIn('id', $param['except']);
            }

            if(array_key_exists('order_by', $param) && !empty($param['order_by'])) {
                $query->orderBy($param['order_by'][0], $param['order_by'][1]);
            } else {
                $query->orderBy('published_at', 'desc');
            }

            if(array_key_exists('random', $param)) {
                $query->inRandomOrder()->limit($param['random']);
            }
            return $query->get();
        });
    }

    public static function sorting(int $location, int $count = 0): Collection
    {
        if($count <= 0) {
            $count = config('haberler.app.sorting_type_limit')[$location];
        }

        return Cache::tags('sortings')->rememberForever(
            ('sorting_' . $location . '_' . $count),
            function () use ($location, $count) {
                $sorting = PostSorting::whereLocation($location)->first();
                $posts = new Collection();
                if (!empty($sorting)) {
                    $posts = $sorting->getPosts($count);
                }
                return $posts;
            }
        );
    }
}