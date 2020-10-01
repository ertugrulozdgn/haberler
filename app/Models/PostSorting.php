<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PostSorting extends Model
{
    public $timestamps = false;

    public function getPosts(int $take): Collection
    {
        // $post_ids = array_slice(json_decode($this->posts), 0, $take);

        //     $get_posts = Post::whereIn('id', $post_ids)->get();

        //     $posts = collect([]);
        //     foreach ($post_ids as $key => $id) {
        //         if ($get_posts->where('id', $id)->first()) {
        //             $posts->push($get_posts->where('id', $id)->first());
        //         }
        //     }
        //     return $posts;
        

        return Cache::tags('post_sorting')->remember('post_sorting_' . $take, 60, function () use ($take) {
            $post_ids = array_slice(json_decode($this->posts), 0, $take);

            $get_posts = Post::with(['cover_img', 'user'])->whereIn('id', $post_ids)->get();

            $posts = collect([]);
            foreach ($post_ids as $key => $id) {
                if ($get_posts->where('id', $id)->first()) {
                    $posts->push($get_posts->where('id', $id)->first());
                }
            }
            return $posts;
        });
    }
}
