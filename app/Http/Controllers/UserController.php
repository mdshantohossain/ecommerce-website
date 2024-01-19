<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'user_type' => 'required'
        ]);

        User::newUser($request);

        return back()->with('message', 'User add successful.');
    }

    public function manage()
    {
        return view('admin.user.manage', [
            'users' => User::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => User::find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
        User::updateUser($request, $id);

        return redirect('/user/manage')->with('message', 'User update successful');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('message', 'User delete successful');
    }
}
