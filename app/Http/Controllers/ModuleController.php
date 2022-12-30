<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Module::simplePaginate(5);
        // $module = Module::all();
        return view('Module/Index', ['modules' => $module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->validate($request, ['modulename' => 'required|string']);

        $module = Module::create($request->only('modulename'));
        return redirect('module/index')->with('status', 'Inserted Succesfully');
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
     * @param  \App\Models\Module1  $module1
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module1  $module1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('Module/edit', ['modules' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module1  $module1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['modulename' => 'required|string']);
        $module = Module::findOrFail($id)->update($request->only('modulename'));
        return redirect('module/index')->with('status', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module1  $module1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::destroy($id);
        return redirect('module/index')->with('status', 'Deleted Succesfully');
    }
}
