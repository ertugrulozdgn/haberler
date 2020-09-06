<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('cms.admin.category.index', compact('categories'));
    }


    public function create()
    {
        $edit = 0;

        $status = config('haberler.category.status');

        $show_in_menu = config('haberler.category.show_in_menu');

        $form_referrer = action('Cms\Admin\CategoryController@index');

        return view('cms.admin.category.edit', compact('edit', 'show_in_menu', 'status', 'form_referrer'));
    }


    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->title);
        $category->seo_title = $request->input('seo_title');
        $category->seo_description = $request->input('seo_description');
        $category->show_in_menu = $request->get('show_in_menu');
        $category->status = $request->input('status');
        $category->save();

        return response()->json(['success' => 'Success'], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit = 1;

        $category = Category::where('id', $id)->first();

        $status = config('haberler.category.status');

        $show_in_menu = config('haberler.category.show_in_menu');

        $form_referrer = action('Cms\Admin\CategoryController@index');

        return view('cms.admin.category.edit', compact('edit', 'category', 'status', 'show_in_menu', 'form_referrer'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->title);
        $category->seo_title = $request->input('seo_title');
        $category->seo_description = $request->input('seo_description');
        $category->show_in_menu = $request->get('show_in_menu');
        $category->status = $request->input('status');
        $category->save();

        return response()->json(['success' => 'Success'], 200);
    }


    public function destroy($id)
    {
        //
    }

    public function sortable()
    {

    }
}
