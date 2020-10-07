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
    {   //Sistemde id olan post var mı
        $post = PostData::get($id);
        //yoksa 404
        abort_if(empty($post), 404);
        //yanlıs slug yönlendirmesinde slug ı düzeltip haber detaya tekrar gönderiyor.
        if ($post->slug != $slug) {
            return redirect($post->link, 301);
        }
        //eğer sistemde postun redirect_linki varsa o linke yönlendir(301 zorunlu yönlendirme)
        if(!empty($post->redirect_link)) {
            return redirect($post->redirect_link, 301);
        }

        $recommended_posts = PostData::list([
            'filters' => [
                'show_on_mainpage' => 1
            ],
            'cache_tag' => 'posts',
            'random' => 5
        ]);

        $recommended_posts = $recommended_posts->filter(function($item) use ($post) {
            return $item->id != $post->id;
        })->values()->slice(0, 4);

        $used_ids = $recommended_posts->pluck('id')->toArray();
        $used_ids[] = $post->id;

        $last_posts = PostData::list([
            'filters' => [
                'show_on_mainpage' => 1,
                'post_type' => 0
            ],
            'cache_tag' => 'posts',
            'count' => 9,
        ]);

        $last_posts = $last_posts->filter(function($item) use ($used_ids) {
            return !in_array($item->id, $used_ids);
        })->values()->slice(0, 4);

        config(['haberler.app.title' => $post->seo_title]);

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

        config(['haberler.app.title' => $tag->name . ' Haberleri']);


        return view('web.post.tag', compact('tag', 'posts'));
    }
}
