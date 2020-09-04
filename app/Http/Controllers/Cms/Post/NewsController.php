<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
    
        return view('cms.post.news.edit', compact('edit', 'location'));
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
