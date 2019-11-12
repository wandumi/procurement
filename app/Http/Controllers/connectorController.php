<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rfq;
use App\Rfqresponse;

class connectorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function showQuotation($id)
    {

        $quotations = Rfqresponse::with('users')->where(
            'rfq_id', $id
        )->get();
        
        // dd($quotations);

        return view('admin.rfqresponse.view', compact('quotations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function viewQuotation($id)
    {
        // dd($id);

        $quotes = Rfqresponse::where('user_id', $id)->count();
        
        // dd($quotes);

        return view('admin.rfqresponse.quotation', compact('quotes'));
    }
}
