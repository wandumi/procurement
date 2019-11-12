<?php

namespace App\Http\Controllers;

use App\Requesttype;
use Illuminate\Http\Request;

class RequesttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requesttypes = Requesttype::all();
        return view('admin.requesttype.index',compact('requesttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requesttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|unique:requesttypes,name',
            'description' => 'required|string|min:10',
        ]);

        $requesttype = new Requesttype;
        $requesttype->name = $request->name;
        $requesttype->description = $request->description;

        $requesttype->save();

        return redirect()->route('requesttypes.index')
               ->with('message','Request Type "'. strtoupper($requesttype->name) .'" has been added successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requesttype  $requesttype
     * @return \Illuminate\Http\Response
     */
    public function show(Requesttype $requesttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requesttype  $requesttype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requesttypes = Requesttype::where('id', $id)->first();
        return view('admin.requesttype.edit',compact('requesttypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requesttype  $requesttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requesttype $requesttype)
    {
        $requesttype->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('requesttypes.index')
            ->with('message', 'Request type "'. strtoupper($requesttype->name) .'" has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requesttype  $requesttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requesttype $requesttype)
    {
        $requesttype->delete();

        return redirect()->route('requesttypes.index')
               ->with('message', 'Request Type "'. strtoupper($requesttype->name) .'" has been Deleted Successfully');
    }
}
