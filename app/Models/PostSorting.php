<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostSorting extends Model
{
    public $timestamps = false;

    public function getPosts(int $take): Collection
    {
        $post_ids = array_slice(json_decode($this->posts), 0, $take);

        $get_posts = Post::whereIn('id', $post_ids)->get();

        $posts = collect([]);
        foreach ($post_ids as $key => $id) {
            if ($get_posts->where('id', $id)->first()) {
                $posts->push($get_posts->where('id', $id)->first());
            }
        }
        return $posts;
    }
}
