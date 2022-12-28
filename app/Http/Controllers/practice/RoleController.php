<?php

namespace App\Http\Controllers\practice;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function list()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('Role/list', ['roles' => $role], ['permissions' => $permission]);
    }
    public function add()
    {
        $role = new Role();
        $role->rollname = 'HR';
        $role->save();

        // Role::findOrFail($id)->insert($request->only('Rollname'));
        // dd('sone')
        // return redirect(route('index'))->with('status', 'Data Updated Successfully !!');
    }
    public function insert()
    {
        $role1 = new Role();
        $role1->rollname = 'Jinal';
        $role1->save();

        //$role = Role::find();
        $perid = [1, 2];
        $role1->permissions()->attach($perid);
    }
    public function show($id)
    {
        $role2 = Role::with('users')->findOrFail($id);
        dd($role2->toArray());
    }
    public function update($id)
    {
        $role3 = Role::find($id);
        $role3->Rollname = "Employee";
        $role3->save();

        return ($role3);
    }
    public function delete($id)
    {
        $role4 = Role::findOrFail($id)->delete();
        return ($role4);
    }
}
