<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        //
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
        //
    }
}
