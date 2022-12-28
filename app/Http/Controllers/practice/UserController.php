<?php

namespace App\Http\Controllers\practice;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list()
    {
        // $user = User::Paginate(5);
        $user = User::all();
        //$role = Role::Paginate(5);
        $role = Role::all();
        return view('User/Index', ['users' => $user], ['roles' => $role]);
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
