<?php

namespace App\Http\Controllers\Cms\Admin;



use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

        return view('cms.admin.user.edit', compact('edit'));
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
