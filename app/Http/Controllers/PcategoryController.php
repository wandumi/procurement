<?php

namespace App\Http\Controllers;

use App\Pcategory;
use Illuminate\Http\Request;

class PcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcategories = Pcategory::all();
        return view('admin.procurementcategory.index', compact('pcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.procurementcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:5|unique:pcategories,name',
            'description' => 'required|string|min:10',
        ]);

        $pcategories = new Pcategory;
        $pcategories->name = $request->name;
        $pcategories->description = $request->description;
        $pcategories->save();

        return redirect()->route('procategories.index')
               ->with('message', 'Procurement Category "'. strtoupper($pcategories->name) .'" has been added Successfully ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Pcategory $pcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pcategory = Pcategory::where('id',$id)->first();
        return view('admin.procurementcategory.edit', compact('pcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcategory $pcategory)
    {
//        dd($pcategory);
        $pcategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('procategories.index')
            ->with('message', 'Procurement Category "'. strtoupper($pcategory->name) .'" has been Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcategory $pcategory)
    {
        $pcategory->delete();

        return redirect()->route('procategories.index')
            ->with('message', 'Procurement Category "'. strtoupper($pcategory->name) .'" has been Deleted Succesfully');

    }
}
