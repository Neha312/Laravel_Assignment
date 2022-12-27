<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function list()
    {
        $permission = Permission::all();
        $modules = Module::all();
        return view('Permission/list', ['permissions' => $permission], ['modules' => $modules]);
    }
    public function add()
    {
        $permission = new Permission();
        $permission->name = 'Payment';
        $permission->save();

        // $role = Role::find(1);
        $roleid = [4, 2];
        $permission->roles()->attach($roleid);
    }
    public function show($id)
    {
        $per2 = Permission::with('roles')->findOrFail($id);
        dd($per2->toArray());
    }
    public function update($id)
    {
        $per3 = Permission::find($id);
        $per3->name = "Testing";
        $per3->save();

        return ($per3);
    }
    public function delete($id)
    {
        $per4 = Permission::findOrFail($id)->delete();
        return ($per4);
    }
}
