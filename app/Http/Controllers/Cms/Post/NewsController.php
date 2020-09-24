<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\NewsRequest;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostSorting;
use App\Models\Tag;
use App\Models\User;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $post->short_title = $request->input('short_title');
        $post->location = $request->input('location');
        $post->status = $request->input('status');
        $post->show_on_mainpage = $request->input('show_on_mainpage');
        $post->commentable = $request->input('commentable');
        $post->created_by = Auth::user()->id;
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');
        $post->editor_id = $request->input('editor_id');
        $post->title = request()->filled('title') ? $request->input('title') : $request->input('short_title');
        $post->redirect_link = $request->input('redirect_link') ?? '';
        $post->slug = $request->filled('title') ? Str::slug($post->title) : Str::slug($post->short_title);
        $post->seo_title = $request->filled('seo_title') ? ($request->input('seo_title')) : ($request->filled('title') ? $request->input('title') : request()->input('short_title'));
        $post->published_at = $request->input('published_at');
        
        if($request->hasFile('cover_img')) {
            $post->cover_id = $post->attachment('cover_img');
        }
        if($request->hasFile('headline_img')) {
            $post->headline_id = $post->attachment('headline_img');
        }
        
        if ((new \Date($request->input('published_at'))) > (new \Date())) {
            $post->status = 2;
        }

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
        $post->short_title = $request->input('short_title');
        $post->location = $request->input('location');
        $post->status = $request->input('status');
        $post->show_on_mainpage = $request->input('show_on_mainpage');
        $post->commentable = $request->input('commentable');
        $post->updated_by = Auth::user()->id;
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');
        $post->editor_id = $request->input('editor_id');
        $post->title = $request->filled('title') ? $request->input('title') : $request->input('short_title');
        $post->redirect_link = $request->input('redirect_link') ?? '';
        $post->slug = $request->filled('title') ? Str::slug($post->title) : Str::slug($post->short_title);
        $post->seo_title = $request->filled('seo_title') ? ($request->input('seo_title')) : ($request->filled('title') ? $request->input('title') : request()->input('short_title'));
        $post->published_at = $request->input('published_at'); // tarih carbon now a eşit veya ileri tarihse tarihi kaydet yoksa kaydetme eski tarih kalsın
        if($request->hasFile('cover_img')) {
            $post->cover_id = $post->attachment('cover_img');
        }
        if($request->hasFile('headline_img')) {
            $post->headline_id = $post->attachment('headline_img');
        }
        if ((new \Date($request->input('published_at'))) > (new \Date())) {
            $post->status = 2;
        }
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


    public function takesorting()
    {
        $location = [2,3];

        $take = config('haberler.app.sorting_type_limit')[2];

        $posts = Post::all();

        $posts = Post::whereLocation($location); 
    }
}
