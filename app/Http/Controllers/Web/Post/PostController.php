<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //id gelecek slug gelecek func içine unutma
    public function show()
    {
        return view('web.post.news.show');
    }

    public function tag() 
    {    
        return view('web.post.tag');
    }
}
