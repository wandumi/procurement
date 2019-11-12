<?php

namespace App\Http\Controllers;

use App\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = department::all();
        // dd($departments);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required|max:191|unique:roles,name',
            
            'description' => 'required|max:191',
        ]);

        $department = new department;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return redirect()->route('departments.index')
            ->with('message', ' '. $department->name .' Department, has been created in the database');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = department::where('id', $id)->first();
        // dd($departments);
        return view('admin.departments.edit',compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = department::findOrfail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        

        return redirect()->route('departments.index')
            ->with('message', 'Department "'. strtoupper($department->name) .'" has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
               ->with('message', 'Department "'. strtoupper($department->name) .'" has been Deleted Successfully');
    }
}
