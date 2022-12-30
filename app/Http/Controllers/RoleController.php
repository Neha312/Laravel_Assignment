<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::simplePaginate(5);
        $permission = Permission::all();
        return view('Role/Index', ['roles' => $role], ['permissions' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, ['rollname' => 'required|string']);

        $role = Role::create($request->only('rollname'));
        // $perid = [1, 2];
        // $role->permissions()->attach($perid);
        $permissionid = Permission::find($request->permission);
        $role->permissions()->attach($permissionid);
        return redirect('role/index')->with('status', 'Inserted Succesfully');
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
     * @param  \App\Models\Role1  $role1
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role1  $role1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('Role/edit', ['roles' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role1  $role1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['rollname' => 'required|string']);
        $role = Role::findOrFail($id)->update($request->only('rollname'));
        return redirect('role/index')->with('status', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect('role/index')->with('status', 'Deleted Succesfully');
    }
}
