<?php

namespace App\Http\Controllers;

use App\Rfq;
use Validator;

use App\Quotation;

use App\Requesttype;
use App\Rfqresponse;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        return view('admin.quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if($request->ajax())
        {
            $rules = array(
                'first_name.*' => 'required',
                'last_name.*' => 'required',
            );

            $error = Validator::make($request->all(), $rules);

            dd($error);
            //If there are errors being reported
            if($error->fails())
            {
                return response()->json([
                    'error' => $error->erorrs()->all()
                ]);
            }

            //Send the data to the database 
            $first_name = $request->first_name;
            $last_name = $request->last_name;

            for($count = 0; $count < count($first_name); $count++)
            {

                $data = array(
                    'first_name' => $first_name[$count],
                    'last_name' => $last_name[$count]
                );

                $insert_data[] = $data;
            }

            //Insert to the database from the dynamic form being created
            Quotation::insert($insert_data);

            return response()->json([
                'success' => 'Data Added successfully.'
            ]);

        }
            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        dd($quotation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
}
