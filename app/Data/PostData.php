<?php

namespace App\Data;

use App\Models\PostSorting;
use Illuminate\Support\Collection;

class PostData 
{
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