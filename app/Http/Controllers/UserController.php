<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function list()
    {
        $user = User::all();
        $role = Role::all();
        return view('User/list', ['users' => $user], ['roles' => $role]);
    }
    public function add()
    {
        $user = new User();
        $user->username = 'jinal';
        $user->save();

        //$role = Role::find();
        $roleid = [1, 2];
        $user->roles()->attach($roleid);
        //return route('index');
        // return view('User/Index', ['users' => $user], ['roles' => $role]);
    }
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        dd($user->toArray());
    }
    public function update($id)
    {
        $user = User::find($id);
        $user->username = "Ravi";
        $user->save();

        return ($user);
    }
    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
        return ($user);
    }
}
