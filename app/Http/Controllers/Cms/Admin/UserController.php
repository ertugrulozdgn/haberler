<?php

namespace App\Http\Controllers\Cms\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\UserRequest;
use App\Http\Requests\StoreUserPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('cms.admin.user.index', compact('users'));
    }


    public function create()
    {
        $edit = 0;

        $status = config('haberler.user.status');

        return view('cms.admin.user.edit', compact('edit', 'status'));
    }


    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->save();


        if($request->get('save') == 'save')
        {
            return redirect(action('Cms\Admin\UserController@index'))->with('success', 'Kayıt İşlemi Başarılı');

        } elseif ($request->get('save') == 'save_and_continue')
        {
            return redirect()->back()->with('success', 'Kayıt İşlemi Başarılı');

        } else {
            return redirect()->back()->with('error','Başarısız');
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit = 1;

        $user =User::where('id', $id)->first();

        $status = config('haberler.user.status');

        return view('cms.admin.user.edit', compact('edit', 'user', 'status'));
    }


    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->status = $request->input('status');
        $user->save();

        if($request->get('save') == 'save')
        {
            return redirect(action('Cms\Admin\UserController@index'))->with('success', 'Kayıt işlemi başarılı');

        } elseif ($request->get('save') == 'save_and_continue')
        {
            return redirect()->back()->with('success', 'Kayıt İşlemi Başarılı');

        } else {
            return redirect()->back()->with('error','Başarısız');
        }
    }


    public function destroy($id)
    {
        //
    }
}
