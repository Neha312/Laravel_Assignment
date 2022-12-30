<?php

namespace App\Http\Controllers;


use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::simplepaginate(5);
        $modules = Module::all();
        return view('Permission/Index', ['permissions' => $permission], ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $permission = new Permission();
        // $permission->name = 'Payment';
        // $permission->save();

        // $role = Role::find(1);

        $this->validate($request, ['name' => 'required|string']);

        $permission = Permission::create($request->only('name'));
        // $roleid = [4, 2];
        // $permission->roles()->attach($roleid);

        $moduleid = Module::find($request->module);
        $permission->modules()->attach($moduleid);
        return redirect('permission/index')->with('status', 'Inserted Succesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission1  $permission1
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission1  $permission1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('Permission/edit', ['permissions' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission1  $permission1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required|string']);
        $permission = Permission::findOrFail($id)->update($request->only('name'));
        return redirect('permission/index')->with('status', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission1  $permission1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect('permission/index')->with('status', 'Deleted Succesfully');
    }
}
