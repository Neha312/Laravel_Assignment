<?php

namespace App\Http\Controllers;



use App\Models\Role;
use App\Models\User;
use Psy\Readline\Userland;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::Paginate(5);
        $user = User::all();
        $role = Role::all();
        return view('User/Index', ['users' => $user], ['roles' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $user = new User1();
        // $user->username = 'jinal';
        // $user->save();

        //$role = Role::find();
        $this->validate($request, ['username' => 'required|string']);

        $user = User::create($request->only('username'));
        // $roleid = [1, 2];


        $roleid = Role::find($request->role);
        $user->roles()->attach($roleid);
        return redirect('user/index')->with('status', 'Inserted Succesfully');
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
     * @param  \App\Models\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        dd($user->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('User/edit', ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $user = User1::find($id);
        // $user->username = "Ravi";
        // $user->save();
        $this->validate($request, ['username' => 'required|string']);
        $user = User::findOrFail($id)->update($request->only('username'));
        return redirect('user\index')->with('status', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = User1::findOrFail($id)->delete();
        // return ($user);

        User::destroy($id);
        return redirect('user\index')->with('status', 'Deleted Succesfully');
    }
}
