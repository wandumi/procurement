<?php

namespace App\Http\Controllers;

use App\Rfqstatus;
use Illuminate\Http\Request;

class RfqstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rfqstatuses = Rfqstatus::all();
        //dd($Rfqstatuses);
        return view('admin.rfqstatus.index', compact('Rfqstatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rfqstatus.create');
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
            'name' => 'required|string|min:5|unique:rfqstatuses,name',
            'description' => 'required|string|min:10',
        ]);

        $Rfqstatuse = new Rfqstatus;
        $Rfqstatuse->name = request('name');
        $Rfqstatuse->description = request('description');
        $Rfqstatuse->save();

        return redirect()->route('rfqstatus.index')
               ->with('message','R.F.Q Status "'. strtoupper($Rfqstatuse->name) .'" has been Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rfqstatus  $rfqstatus
     * @return \Illuminate\Http\Response
     */
    public function show(Rfqstatus $rfqstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rfqstatus  $rfqstatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Rfqstatus $rfqstatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rfqstatus  $rfqstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rfqstatus $rfqstatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rfqstatus  $rfqstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rfqstatus $rfqstatus)
    {
        $rfqstatus->delete();

        return redirect()->route('rfqstatus.index')
               ->with('message','R.F.Q Status "'. strtoupper($rfqstatus->name) .'" has been DELETED Successfully');

    }
}
