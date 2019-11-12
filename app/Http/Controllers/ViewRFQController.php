<?php

namespace App\Http\Controllers;

use auth;
use App\Rfq;
use App\ViewRFQ;
use Carbon\Carbon;
use App\Requesttype;
use App\Rfqresponse;
use Illuminate\Http\Request;

class ViewRFQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        
        $published = Rfq::where('status_id','1')->get();
        $unpublished = Rfq::where('status_id', null)->get();

        return view('admin.viewrfqs.index', compact('published','unpublished'));
        
        
        
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewRFQ  $viewRFQ
     * @return \Illuminate\Http\Response
     */
    public function show(ViewRFQ $viewRFQ)
    {
        // $viewRFQ = Rfq::where('id', $viewRFQ)->first();
        // $requesttypes = Requesttype::all();
        // dd($requesttypes);

        // return view('admin.rfqresponse.create', compact('viewRFQ','requesttypes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewRFQ  $viewRFQ
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewRFQ $viewRFQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewRFQ  $viewRFQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewRFQ $viewRFQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewRFQ  $viewRFQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewRFQ $viewRFQ)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collectionsMe()
    {
        // $products = [
            //     [
            //         'name' => 'Tires',
            //         'price' => 1699.99,
            //     ], 
            //     [
            //         'name' => 'Balloons',
            //         'price' => 10.95,
            //     ], 
            //     [
            //         'name' => 'Jeans',
            //         'price' => 99.99,
            //     ], 
            //     [
            //         'name' => 'Computer',
            //         'price' => 18890.00,
            //     ],
            //     [
            //         'name' => 'Television',
            //         'price' => 5299.99,
            //     ], 
            //     [
            //         'name' => 'Helicopter',
            //         'price' => 15000000.00,
            //     ],
            //   ];
    
            
    
            // $product = array_filter($products, function($value){
            //     return $value['price'] > 1500;
            // });
    
            // $product2 = collect($products);
    
            // $product3 = $product2->filter(function($query){
            //     return $query['price'] > 1500;
            // });
    
            // $product3 = $product2->average('price');
    
            // dd($product3);
    }
    
}
