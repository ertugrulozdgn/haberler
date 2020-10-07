<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\NewsRequest;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Models\PostSorting;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class NewsController extends Controller
{

    public function index()
    {

        $posts = Post::orderBy('published_at', 'desc')->with('categories')->get();  //post-categroy ilişkisindeki post->category->name değerini almak için with('categories') yazdım. Post modelin içindeki func adı categories.

        return view('cms.post.news.index', compact('posts'));
    }


    public function create()
    {

        $edit = 0;

        $location = config('haberler.post.location');

        $form_referrer = action('Cms\Post\NewsController@index');

        $users = User::pluck('name', 'id');

        $show_in_mainpage = config('haberler.post.show_in_mainpage');

        $commentable = config('haberler.post.commentable');

        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'slug');

        $status = config('haberler.post.status');



        return view('cms.post.news.edit', compact(
            'edit',
            'location',
            'form_referrer',
            'users',
            'show_in_mainpage',
            'commentable',
            'categories',
            'status',
            'tags'
        ));
    }


    public function store(NewsRequest $request)
    {
        $post = new Post();
        $post->post_type = 0;
        $post->defaultAddModel();
        $tags = $request->get('tags');
        $tagIds = [];
        foreach($tags as $tag)
        {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => Str::slug($tag)]);
            $tagIds[] = $tag->id;
        }
        $post->save();
        $post->tags()->sync($tagIds);
        $post->categories()->attach($request->input('category_id'));
        $post->setHeadline();
        $post->cleanCache();
        
        return response()->json(['success' => 'success'], 200);
 
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit = 1;

        $post = Post::find($id);

        $form_referrer = action('Cms\Post\NewsController@index');

        $location = config('haberler.post.location');

        $users = User::pluck('name', 'id');

        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'slug');

        $show_in_mainpage = config('haberler.post.show_in_mainpage');

        $commentable = config('haberler.post.commentable');

        $status = config('haberler.post.status');

        return view('cms.post.news.edit', compact(
            'edit',
            'post',
            'form_referrer',
            'location',
            'users',
            'categories',
            'tags',
            'show_in_mainpage',
            'commentable',
            'status'
        ));
    }


    public function update(NewsRequest $request, $id)
    {
        $post = Post::find($id);
        PostObserver::$old_location = $post->location;
        PostObserver::$old_status = $post->status;
        $post->defaultAddModel();
        $tags = $request->get('tags');
        $tagIds = [];
        foreach($tags as $tag)
        {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => Str::slug($tag)]);
            $tagIds[] = $tag->id;
        }
        $post->save();

        $post->tags()->sync($tagIds);
        $post->categories()->sync($request->input('category_id'));
        $post->setHeadline();
        $post->cleanCache();

        return response()->json(['success' => 'success'], 200);


    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->deleted_by = Auth::user()->id;
        $post->save();

        try{
            // $post->categories()->detach();
            $post->delete();
            return 1;
        } catch(\Exception $ex) {
            return 0;
        }
    }


    // public function takesorting()
    // {
    //     $location = [2,3];

    //     $take = config('haberler.app.sorting_type_limit')[2];

    //     $posts = Post::all();

    //     $posts = Post::whereLocation($location);
    // }

    // $post_sorting = PostSorting::get();
    //         $post_ids = array_merge(json_decode($post_sorting[0]->posts), json_decode($post_sorting[1]->posts));
    //         if (in_array($post->id, $post_ids)) {
    //             $take_post = array_search($post->id, $post_ids);
    //             unset($post_ids[$take_post]);
    //             dd($post_ids);

    //         }
    //-------------------------------------------
    //Store
    //        if ($post->location != 1 && $post->status == 1) {
//            $post_sorting = PostSorting::whereLocation($post->location)->first();
//
//            $post_ids = json_decode($post_sorting->posts);
//
//            if (!in_array($post->id, $post_ids)) {
//                $post_ids = array_merge([$post->id], $post_ids);
//                if(count($post_ids) > config('haberler.app.sorting_type_limit')[$post->location]) {
//                    array_pop($post_ids);
//                }
//                $post_sorting->posts = json_encode($post_ids);
//                $post_sorting->save();
//            }
//        }
    //-------------------------------------------
        // addHeadline
        // fixHeadline
        // removeHeadline

        // if ($post->location != 1 && $post->status == 1) {
        //     $post_sorting = PostSorting::whereLocation($post->location)->first();

        //     $post_ids = json_decode($post_sorting->posts);

        //     if (!in_array($post->id, $post_ids)) {
        //         $post_ids = array_merge([$post->id], $post_ids);
        //         if(count($post_ids) > config('haberler.app.sorting_type_limit')[$post->location]) {
        //             array_pop($post_ids);
        //         }
        //         $post_sorting->posts = json_encode($post_ids);
        //         $post_sorting->save();
        //     }
        // } else{//Senoryalar doğrultusunda else-elseif ler düzeltilecek.
        //     $post_sorting = PostSorting::whereLocation($old_location)->whereStatus(1)->first();
        //     $post_ids = json_decode($post_sorting->posts); //sortingdeki posts lar
        //     if(in_array($post->id ,$post_ids)) {
        //         $take_post = array_search($post->id, $post_ids);
        //         unset($post_ids[$take_post]);
        //     }
        //     if(count($post_ids) < config('haberler.app.sorting_type_limit')[$old_location]) {
        //         $take = config('haberler.app.sorting_type_limit')[$post_sorting->location] - count($post_ids);
        //         // limit olarak 3 adet var. unset ile haberi sildiğimiz için post_ids=2 adet oldu. limit değerinden post_ids çıkarında sonuç 1 kaldı.Yani 1 post eklicez.
        //         $other_posts = Post::active()->whereLocation($post_sorting->location)->whereNotIn('id', (array)$post_ids)->orderBy('published_at', 'desc')->take($take)->get()->pluck('id')->toArray();

        //         $post_ids = array_merge($post_ids, $other_posts);
        //         $post_sorting->posts = json_encode($post_ids);
        //         $post_sorting->save();
        //     }
        // }
}
