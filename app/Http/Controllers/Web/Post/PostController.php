<?php

namespace App\Http\Controllers\Web\Post;

use App\Data\PostData;
use App\Data\TagData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug, $id)
    {   //Sistemde slug ve id olan post var mı
        $post = PostData::get($slug, $id);
        //yoksa 404
        abort_if(empty($post), 404);
        //eğer sistemde postun redirect_linki varsa o linke yönlendir(301 zorunlu yönlendirme)
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
            'count' => 4,
        ]);

        return view('web.post.news.show', compact('post', 'last_posts', 'recommended_posts'));
    }

    public function tag($slug) 
    {    //Sistemde böyle bi tag var mı
        $tag = TagData::get($slug);
        //yoksa 404
        abort_if(empty($tag), 404);
        //Bu tag ile ilgili post lar
        $posts = PostData::list([
            'filters' => [
                'tags' => $tag->id
            ],
            'cache_tag' => 'tag_posts_' . $slug
        ]);

        // $posts = Post::active()->whereHas('tags', function($t) use ($tag) {
        //     $t->whereId($tag->id);
        // })->get();


        return view('web.post.tag', compact('tag', 'posts'));
    }
}
