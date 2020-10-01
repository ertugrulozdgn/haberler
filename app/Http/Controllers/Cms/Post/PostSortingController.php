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
        $location = (int) request()->input('location');  //sıralamalardaki url location değeri

        try {
            $take = config('haberler.app.sorting_type_limit')[$location];  //location lari çin belirlenmiş sıralama limiti
        } catch (\Exception $ex) {
            abort(404);
        }

        $post_sorting = PostSorting::whereLocation($location)->first();  //location'u ne ise postsorting tablosundan o location'a ait sutünü çağırıldı
        
        if (empty($post_sorting)) {     // post sorting tablosunda kayıt yoksa yeni boş bir kayıt oluşturduk.
            $post_sorting = new PostSorting();
            $post_sorting->location = $location;
            $post_sorting->status = 1;
            $post_sorting->posts = json_encode([]);
            $post_sorting->save();
        }

        $posts = $post_sorting->getPosts($take); // sıralama limiti ne ise o kadar post çektik post sorting tablosundan

        $other_posts = Post::whereLocation($location)->whereNotIn('id', $posts->pluck('id')->toArray())->skip(0)->take(20)->get();  //diğer location haberlerini çektik sıralanan limitli haberlerin altına sıralansın diye

        return view('cms.post.post_sorting.index', compact('location', 'posts', 'other_posts'));
    }

    public function sort()
    {
        $location = (int) request()->input('location');  //sıralamalardaki url location değeri

        $post_sorting = PostSorting::whereLocation($location)->first(); //location'u ne ise postsorting tablosundan o location'a ait sutün çağırıldı.

        $take = config('haberler.app.sorting_type_limit')[$location]; // location'lar için belirlenmiş sıralama limiti

        $items = request()->input('item'); // index.blade kısmında ki item değeri

        $post_ids = array_slice($items, 0, $take);  //
        $post_ids = array_map('intval', $post_ids);

        $post_sorting->posts = json_encode((array) $post_ids);
        
        $post_sorting->save();

        return response()->json(['success' => 'success'], 200);
    }

}
