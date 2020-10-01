<?php

namespace App\Http\Controllers\Web;

use App\Data\PageData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {   
        $page = PageData::get($slug);

        abort_if(empty($page), 404);

        return view('web.page.show', compact('page'));
    }

}
