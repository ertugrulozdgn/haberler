<?php

namespace App\Http\Controllers\Web\Post;

use App\Data\CategoryData;
use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($slug) 
    {
        $category = CategoryData::slug($slug);

        abort_if(empty($category), 404);
        
        $header_posts = PostData::list([
            'filters' => [
                'categories' => $category->id
            ],
            'count' => 2
        ]);

        $used_ids = $header_posts->pluck('id')->toArray();

        $posts = PostData::list([
            'filters' => [
                'categories' => $category->id
            ],
            'except' => $used_ids
        ]);

        return view('web.post.news.index', compact('category', 'posts', 'header_posts'));

//-----------------------------------------------------

        // $category = CategoryData::slug($slug);

        // $header_posts = Post::active()->whereHas('categories', function ($cat) use($category) {
        //     $cat->whereSlug($category->slug);
        //     })->take(2)->get();

        // $used_ids = $header_posts->pluck('id')->toArray();
        
        // $posts = Post::active()->whereNotIn('id', $used_ids)->whereHas('categories', function ($cat) use ($category) {
        //     $cat->whereSlug($category->slug);
        // })->get();

        // return view('web.post.news.index', compact('category', 'posts', 'header_posts'));

//-----------------------------------------------------

        
    }

}
