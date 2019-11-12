<?php

namespace App\Http\Controllers;

use App\Uploadedfiles;
use App\Quotation;
use Validator;
use Illuminate\Http\Request;

class UploadedfilesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
         dd($request->all());

        $rules = [];

        foreach($request->input('name') as $key => $value){
            $rules["name.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->passes()){
            foreach($request->input('name') as $key => $value){
                Uploadedfiles::create(['name' => $value]);
            }

            return response()->json(['success'=>'done']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

        // if($request->ajax())
        // {
        //     //check in the array being submitted from the client
        //     $rules = array(
        //         'product_name.*' => 'required',
        //         'description.*' => 'required', 
        //         'quantity.*' => 'required', 
        //         'unit_price.*' => 'required',
        //         'total_cost_item.*' => 'required',    
        //     );

        //     //pass them in this validator to see if its correct
        //     $error = Validator::make($request->all(), $rules);

        //     // dd($error);

        //     //if it fails send an error to the view
        //     if($error->fails()){
        //         return response()->json([
        //             'error' => $error->errors()->all(),
        //         ]);
        //     }

        //     // if its true get the values
        //     $userid = auth()->id();
        //     $rfq_id = $request->rfq_id;
        //     dd($rfq_id);
        //     $product_name = $request->product_name;
        //     $description = $request->descrtiption;
        //     $quantity = $request->quantity;
        //     $unit_price = $request->unit_price;
        //     $total_cost_item = $request->total_cost_item;

        //     //loop for the second time to get each values in it.
        //     for ($count=0; $count < count($product_name) ; $count++) { 
        //         $data = array(
        //             'rfq_id' => $rfq_id,
        //             'user_id' => $userid,
        //             'product_name' => $product_name[$count],
        //             'description' => $description[$count],
        //             'quantity' => $quantity[$count],
        //             'unit_price' => $unit_price[$count],
        //             'total_cost_item' => $total_cost_item[$count],
        //         );
        //         //push it to an array by passing the result to here
        //         $save_quotation[] = $data;
        //         dd($save_quotation);
        //     }

        //     //inserting multiple values to the database in laravel
        //     Quotation::insert($save_quotation);

        //     //return data to the view if its successfull
        //     return response()->json([
        //         'success' => 'Your Quotation has been Submitted Successfully.',
        //     ]);
        // }
    }
}
