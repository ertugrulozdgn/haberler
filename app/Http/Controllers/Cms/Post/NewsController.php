<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\NewsRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();

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

        $status = config('haberler.post.status');

        return view('cms.post.news.edit', compact(
            'edit',
            'location',
            'form_referrer',
            'users',
            'show_in_mainpage',
            'commentable',
            'categories',
            'status'
        ));
    }


    public function store(Request $request)
    {

        $request->validate([
            'short_title' => 'required',
            'published_at' => 'required|date',
            'summary' => 'required',
            'content' => 'required',
            // 'cover_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post = new Post();
        
        $post->short_title = $request->input('short_title');
        $post->location = $request->input('location');
        //$post->published_at = $request->input('published_at');
        $post->show_on_mainpage = $request->input('show_in_mainpage');
        $post->commentable = $request->input('commentable');
        $post->created_by = Auth::user()->id;
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');
        $post->status = $request->input('status');
        $post->editor_id = $request->input('editor_id');
        
        if(!empty($request->input('title'))) 
        {
            $post->title = $request->input('title');
        } else {
            $post->title = $request->input('short_title');
        }

        if(empty($request->input('seo_title')))
        {
           if(empty($request->input('title')))
           {
                $post->seo_title = $request->input('short_title');
           } else{
                $post->seo_title = $request->input('title');
           }
        } else {
            $post->seo_title = $request->input('seo_title');
        }

        if(!empty($request->input('redirect_link')))
        {
            $post->redirect_link = $request->input('redirect_link');
        }

        $post->slug = Str::slug($post->title);

        $post->save();

        return redirect(action('Cms\Post\NewsController@index'))->with('success', 'İşlem Başarılı');
        

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

        try{
            $post->delete();
            return 1;
        } catch(\Exception $ex) {
            return 0;
        }
    }
}
