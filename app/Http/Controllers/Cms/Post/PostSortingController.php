<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostSorting;
use Illuminate\Http\Request;

class PostSortingController extends Controller
{
    public function index()
    {
        $location = (int) request()->query('location');

        try {
            $take = config('haberler.app.sorting_type_limit')[$location];
        } catch (\Exception $ex) {
            abort(404);
        }


        $post_sorting = PostSorting::where('location', $location)->first();
        
        if (empty($post_sorting)) {
            $post_sorting = new PostSorting();
            $post_sorting->location = $location;
            $post_sorting->status = 1;
            $post_sorting->posts = json_encode([]);
            $post_sorting->save();
        }

        $take = config('haberler.app.sorting_type_limit')[$location];

        $posts = $post_sorting->getPosts($take);

        $other_posts = Post::where('location', $location)->whereNotIn('id', $posts->pluck('id')->toArray())->skip(0)->take(20)->get();

        

        return view('cms.post.post_sorting.index', compact('location', 'posts', 'other_posts'));
    }

    public function sort()
    {
        $location = (int) request()->input('location');

        $post_sorting = PostSorting::where('location', $location)->first();

        $take = config('haberler.app.sorting_type_limit')[$location];


        $items = request()->input('item');

        $post_ids = array_slice($items, 0, $take);
        $post_ids = array_map('intval', $post_ids);

        $post_sorting->posts = json_encode($post_ids);
        
        $post_sorting->save();

        return response()->success();
    }




    // public function store() 
    // {
    //     $location = (int) request()->query('location');

    //     $post_sorting = PostSorting::whereLocation($location)->first();

    //     if(!$post_sorting) {
    //         $post_sorting = new PostSorting();
    //     }

    //     $post_sorting->location = (int) $location;
    //     $post_sorting->posts = null;
    //     $post_sorting->status = 1;
    //     $post_sorting->save();



        
    // }

    // public function store(Request $request) 
    // {
    //     $sortedList = PostSorting::where('location', $request->location)->first();
    //     $sortedList->posts = json_encode($request->sortings);
    //     $sortedList->save();
    // }
}
