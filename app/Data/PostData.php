<?php

namespace App\Data;

use App\Models\Post;
use App\Models\PostSorting;
use Illuminate\Support\Collection;

class PostData 
{
    public static function get($slug, $id): ?Post
    {
        $post = Post::active()->whereSlug($slug)->whereId($id)->first();

        return $post;
    }

    public static function list(array $param): Collection
    {
        $query = Post::active();

        if(array_key_exists('filters', $param) && !empty($param['filters'])) {   // Belirtilen anahtar veya indis dizide var mı
            foreach($param['filters'] as $key => $value) {                      //filters içindekileri key value diye dönderdik.
                $query->where($key, $value);
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
        return $query->get();
    }

    public static function sorting(int $location, int $count = 0): Collection
    {
        if($count <= 0) {
            $count = config('haberler.app.sorting_type_limit')[$location];
        }

        $sorting = PostSorting::whereLocation($location)->first();
        
        $posts = new Collection();
        if(!empty($sorting)) {
            $posts = $sorting->getPosts($count);
        }
        return $posts;
    }

}