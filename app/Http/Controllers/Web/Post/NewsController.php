<?php

namespace App\Http\Controllers\Web\Post;

use App\Data\CategoryData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($slug) 
    {
        $category = CategoryData::slug($slug);

        dd($category);

        abort_if(empty($category), 404);

        return view('web.post.news.index');
    }

}
