<?php

namespace App\Http\Controllers\Cms\Admin;



use App\Http\Controllers\Controller;
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

        $situations = Config::get('user.active');

        return view('cms.admin.user.edit', compact('edit', 'situations'));
    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required|Min:8|Max:20|confirmed'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->active = $request->input('active');
        $user->save();

        if($user->save())
        {
            return redirect()->back()->with('success','Kayıt İşlemi Başarılı');

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
