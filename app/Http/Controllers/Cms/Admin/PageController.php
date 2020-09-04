<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\Cms\PageRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->get();

        $show_in_footer = config('haberler.page.show_in_footer');

        return view('cms.admin.page.index', compact('pages', 'show_in_footer'));
    }


    public function create()
    {
        $edit = 0;

        $show_in_footer = config('haberler.page.show_in_footer');

        $status = config('haberler.page.status');

        $form_referrer = action('Cms\Admin\PageController@index');

        return view('cms.admin.page.edit', compact('edit', 'show_in_footer', 'status', 'form_referrer'));
    }


    public function store(PageRequest $request)
    {
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = Str::slug($page->title);
        $page->content = $request->input('content');
        $page->show_in_footer = $request->input('show_in_footer');
        $page->status = $request->input('status');
        $page->created_by = Auth::user()->name;
        $page->save();

        return response()->json(['success', 'Success', 200]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $edit = 1;

        $page = Page::where('id', $id)->first();

        $show_in_footer = config('haberler.page.show_in_footer');

        $status = config('haberler.page.status');

        $form_referrer = action('Cms\Admin\PageController@index');

        return view('cms.admin.page.edit', compact('edit', 'page', 'show_in_footer', 'status', 'form_referrer'));
    }


    public function update(PageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->slug = Str::slug($page->title);
        $page->content = $request->input('content');
        $page->show_in_footer = $request->input('show_in_footer');
        $page->status = $request->input('status');
        $page->updated_by = Auth::user()->name;
        $page->save();

        return response()->json(['success', 'Success', 200]);
    }


    public function destroy($id)
    {
        $page = Page::find($id);

        try {
            $page->delete();
            return 1;
        } catch(\Exception $ex) {
            return 0;
        }
    }
}
