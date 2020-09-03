<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->get();

        return view('cms.admin.page.index', compact('pages'));
    }


    public function create()
    {
        $edit = 0;

        $show_in_footer = config('haberler.page.show_in_footer');

        $status = config('haberler.page.status');

        return view('cms.admin.page.edit', compact('edit', 'show_in_footer', 'status'));
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
