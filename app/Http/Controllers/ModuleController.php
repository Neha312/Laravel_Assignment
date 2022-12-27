<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function list()
    {

        $module = Module::all();
        // dd($roles);
        return view('Module/list', ['modules' => $module]);
    }
    public function add()
    {
        $module = new Module();
        $module->modulename = 'Employee Assesment';
        $module->save();

        // $role = Role::find(1);
        $perid = [8];
        $module->permissions()->attach($perid);
    }
    public function show($id)
    {
        $module1 = Module::with('permissions')->findOrFail($id);
        dd($module1->toArray());
    }
    public function update(Request $request, $id)
    {
        // $module2 = Module::find($id);
        // $module2->modulename = "absh";
        // $module2->save();

        // return ($module2);


        Module::findOrFail($id)->update($request->only('name'));
        // dd('sone')
        return redirect(route('index'))->with('status', 'Data Updated Successfully !!');
    }
    public function delete($id)
    {
        $module3 = Module::findOrFail($id)->delete();
        return ($module3);
    }
}
