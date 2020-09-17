<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::all();

        return view('cms.admin.setting.index', compact('settings'));
    }


    public function create()
    {
        //
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
        $setting = Setting::find($id);

        $form_referrer = action('Cms\Admin\SettingController@index');

        return view('cms.admin.setting.edit', compact('setting', 'form_referrer'));
    }


    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $setting->value = $request->input('value');
        $setting->save();

        return response()->json(['success', 'Success', 200]);
    }

 function destroy($id)
    {
        //
    }
}
