<?php

namespace App\Http\Controllers\Web\Post;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //id gelecek slug gelecek func içine unutma
    public function show($slug, $id)
    {
        $post = PostData::get($slug, $id);

        abort_if(empty($post), 404); //haber yoksa 404

        if(!empty($post->redirect_link)) {
            return redirect($post->redirect_link, 301);
        }

        $recommended_posts = Post::active()->whereNotIn('id', [$post->id])->inRandomOrder()->limit(4)->get();

        $last_posts = PostData::list([
            'filters' => [
            'show_on_mainpage' => 1,
            'post_type' => 0
            ],
            'except' => [$post->id],
            'count' => 4
        ]);

        return view('web.post.news.show', compact('post', 'last_posts', 'recommended_posts'));
    }

    public function tag() 
    {    
        return view('web.post.tag');
    }
}
