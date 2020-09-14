<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\NewsRequest;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
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
        $post->show_on_mainpage = $request->input('show_in_mainpage');
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
        $post->attcehmentent('cover_id', 'cover_img');
        if($request->hasFile('headline_img'))
        {
            $post->attcehmentent('headline_id', 'headline_img');
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

        //return response()->json(['success' => 'Success'], 200);

        return redirect(action('Cms\Post\NewsController@index'))->with('success', 'İşlem Başarılı');


        // $file_name = $post->slug. '_' . 'cover'. '_' . mt_rand(1000, 9999);
        // $storage_path = $request->cover_img->storeAs('file/images/' . date('Y/m/d'), $file_name);

        // $attcehmentent = new Attachment;
        // $attcehmentent->type = 'cover_img';
        // $attcehmentent->mime_type = $request->cover_img->getClientOriginalExtension();
        // $attcehmentent->file_name = $file_name;
        // $attcehmentent->storage_path = $storage_path;
        // $attcehmentent->public_path = '/storage/' . $storage_path;
        // $attcehmentent->width = getimagesize($request->file('cover_img'))[0];
        // $attcehmentent->height = getimagesize($request->file('cover_img'))[1];
        // $attcehmentent->save();

        // $post->cover_id = $attcehmentent->id;

        // if($request->hasFile('headline_img'))
        // {

            // $file_name = $post->slug. '_' . 'headline'. '_' . mt_rand(1000, 9999);
            // $storage_path = $request->cover_img->storeAs('file/images/' . date('Y/m/d'), $file_name);

            // $attcehmentent = new Attachment;
            // $attcehmentent->type = '_img';
            // $attcehmentent->mime_type = $request->cover_img->getClientOriginalExtension();
            // $attcehmentent->file_name = $file_name;
            // $attcehmentent->storage_path = $storage_path;
            // $attcehmentent->public_path = '/storage/' . $storage_path;
            // $attcehmentent->width = getimagesize($request->file('cover_img'))[0];
            // $attcehmentent->height = getimagesize($request->file('cover_img'))[1];
            // $attcehmentent->save();
            // $post->headline_id = $attcehmentent->id;
        // }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
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
}
