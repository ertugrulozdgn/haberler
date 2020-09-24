<?php

namespace App\Http\Controllers\Web;

use App;
use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{


//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $headlines = PostData::sorting(2);
        $sub_headlines = PostData::sorting(3);

        $used_ids = $headlines->pluck('id')->toArray();
        $used_ids_sub = $sub_headlines->pluck('id')->toArray();
        $used_ids_total = array_merge($used_ids, $used_ids_sub);

        // $posts = Post::whereNotIn('id', $used_ids_total)->whereStatus(1)->orderBy('published_at', 'desc')->take(15)->get();

        $posts = PostData::list([
            'filters' => [
                'show_on_mainpage' => 1, 
                'post_type' => 0
            ],
            'except' => $used_ids_total,
            'order_by' => ['published_at', 'desc'],
            'count' => 15
        ]);

        return view('web.home.index', compact('headlines', 'sub_headlines', 'posts'));
    }
}
