<?php

namespace App\Http\Controllers;

use App\Suppliertype;
use Illuminate\Http\Request;

class SuppliertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliertypes = Suppliertype::all();
        return view('admin.suppliertype.index', compact('suppliertypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|unique:suppliertypes,name',
            'description' => 'required|string|min:10',
        ]);

        $suppliertype = new Suppliertype;
        $suppliertype->name = $request->name;
        $suppliertype->description = $request->description;
        $suppliertype->save();

        return redirect()->route('suppliertypes.index')
               ->with('message','Supplier Type "'. ucwords($suppliertype->name) .'" has been added Succefully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suppliertype  $suppliertype
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliertype $suppliertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suppliertype  $suppliertype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($suppliertype);
        $suppliertypes = Suppliertype::where('id', $id)->first();


        return view('admin.suppliertype.edit', compact('suppliertypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suppliertype  $suppliertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliertype $suppliertype)
    {
        $suppliertype->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('suppliertypes.index')
            ->with('message', 'Supplier type "'. ucwords($suppliertype->name) .'" has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suppliertype  $suppliertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliertype $suppliertype)
    {
        $suppliertype->delete();

        return redirect()->route('suppliertypes.index')
               ->with('message', 'Supplier type "'. ucwords($suppliertype->name) .'" has been deleted Successfully');
    }
}
