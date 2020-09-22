<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('web.post.news.index');
    }

    public function show()
    {
        return view('web.post.news.show');
    }
}
