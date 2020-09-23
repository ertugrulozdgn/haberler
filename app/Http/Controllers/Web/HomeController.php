<?php

namespace App\Http\Controllers\Web;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $headlines = PostData::sorting(2);
        $used_ids = $headlines->pluck('id')->toArray();
        

        $sub_headlines = PostData::sorting(3);
        $used_ids_sub = $sub_headlines->pluck('id')->toArray();
        
        $used_ids = array_merge($used_ids, $used_ids_sub);

        $posts = Post::whereNotIn('id', $used_ids)->whereStatus(1)->orderBy('published_at', 'desc')->take(15)->get();

        return view('web.home.index', compact('headlines', 'sub_headlines', 'posts'));
    }
}
