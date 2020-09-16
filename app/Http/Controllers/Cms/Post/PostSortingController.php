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
        $location = request()->query('location');  //querty ile url deki location ı aldık.

        $take = config('haberler.app.sorting_type_limit')[$location];  //gelen location değeri ne ise config içinde belirlediğimiz limit değerini getirdik. manşet ise limiti sürmanşet ise limit.  

        $post_sorting = Post::where('location', $location)->get();  // sıralanalacak olan postun location ne ise o postları çektik.

        if($post_sorting) {
            $posts = $post_sorting->getPosts($take);
        }

        $form_referrer = action('Cms\Post\PostSortingController@stora');

        return view('cms.post.PostSorting.index', compact('location', 'posts'));
    }


    // public function index()
    // {   
    //     $location = request()->query('location');
    //     $take = config('bp.app.sorting_type_limit')[$location];
    //     $post_sortings = PostSorting::whereLocation($location)->first();
    //     if ($post_sortings) {
    //         $posts = $post_sortings->getPosts($take);
    //     }
    //     $form_referrer = action('Cms\Post\PostSortingController@store');
    //     return view('cms.post.sorting.index', compact('posts', 'location'));
    // }

    // public function store(Request $request) 
    // {
    //     $sortedList = PostSorting::where('location', request()->location)->first();
    //     $sortedList->posts = json_encode(request()->sortings);
    //     $sortedList->save();
    // }
}
