<?php

namespace App\Http\Controllers;

use App\Rfq;
use App\User;
use Validator;
use Carbon\Carbon;
use App\Requesttype;
use App\Rfqresponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RfqresponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        // $rfqs = Rfqresponse::with('users')->get()->groupBy('user_id');
        
        $rfqs = Rfq::has('rfqresponses')->get();

        $norfqs = Rfq::doesnthave('rfqresponses')->get();
        

        return view('admin.rfqresponse.index', compact('rfqs','norfqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requesttypes = Requesttype::all();
        $procategories = Pcategory::all();
        $suppliertypes = Suppliertype::all();
//        dd($requesttypes);

        return view('admin.rfqresponse.create', 
               compact('requesttypes','procategories','suppliertypes'));
        
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
            //check in the array being submitted from the client
            $rules = array(
                'product_name.*' => 'required',
                'description.*' => 'required', 
                'quantity.*' => 'required', 
                'item_price.*' => 'required',
                'total_cost.*' => 'required',    
            );

            //pass them in this validator to see if its correct
            $error = Validator::make($request->all(), $rules);

            //if it fails send an error to the view
            if($error->fails()){
                return response()->json([
                    'error' => $error->errors()->all(),
                ]);
            }

            // if its true get the values
            $userid = auth()->id();
            $rfq_id = $request->rfq_id;
            $product_name = $request->product_name;
            $description = $request->description;
            $quantity = $request->quantity;
            $item_cost = $request->item_cost;
            $total_cost = $request->total_cost;

            //loop for the second time to get each values in it.
            for ($count=0; $count < count($product_name) ; $count++) { 
                $data = array(
                    'rfq_id' => $rfq_id,
                    'user_id' => $userid,
                    'product_name' => $product_name[$count],
                    'description' => $description[$count],
                    'quantity' => $quantity[$count],
                    'item_cost' => $item_cost[$count],
                    'total_cost' => $total_cost[$count],
                );
                //push it to an array by passing the result to here
                $save_quotation[] = $data;
                // dd($save_quotation);
            }

            //inserting multiple values to the database in laravel
            Rfqresponse::insert($save_quotation);

            //return data to the view if its successfull
            // return response()->json([
            //     'success' => 'Your Quotation has been Submitted Successfully.',
            // ]);

            return redirect()->route('userQuotation')
                   ->with('success','Your quotation has been submitted Successfully');

            
           

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
    
        // Set the session 
        $request->session()->put('rfq_id', $id);
        // //get the session
        $rfqSession = $request->session()->get('rfq_id');
        //authenticated user in the system
        $user_id = auth::id();

        //Check if the user has already applied
        $applied = Rfqresponse::where([
            
            ['user_id', '=', $user_id], 
            ['rfq_id', '=', $rfqSession],

        ])->exists();
        
        if($applied)
        {
            return back()->with('message','You have already applied...');
        }


        // dd($rfqSession);
        $viewRFQ = Rfq::where('id', $id)->first();
        $requesttypes = Requesttype::all();
        // dd($viewRFQ,$requesttypes);

        return view('admin.rfqresponse.create', compact('viewRFQ','requesttypes','rfqSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function edit(Rfqresponse $rfqresponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rfqresponse $rfqresponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rfqresponse  $rfqresponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rfqresponse $rfqresponse)
    {
        //
    }

    public function quotations(Request $request,$quotes)
    {
        
        // dd($quotes);
        // Set the session 
        $request->session()->put('rfq_id', $quotes);
        //get the session
        $rfqSession = $request->session()->get('rfq_id');
        // dd($rfqSession);

        $quotes = User::has('rfqresponses')->get();

        $nonquotes = User::doesntHave('rfqresponses')->get();
       
        // dd($nonquotes);

        return view('admin.rfqresponse.quotelist', compact('quotes','nonquotes','rfqSession'));
    }

    public function quotes(Request $request,$id)
    {
       
        $rfqSession = $request->session()->get('rfq_id');

        // dd($rfqSession);
    
        $quotations = Rfqresponse::where('user_id', $id)
                      ->where('rfq_id', $rfqSession)
                      ->get()
                      ->groupBy('rfq_id')
                      ->first();

        // dd($quotations);

        $user = Rfqresponse::where('user_id',$id)->get();

        // dd($user);

        return view('admin.rfqresponse.quotation', compact('quotations'));
    }

    public function userquote(Request $request)
    {
        
        $rfqSession = $request->session()->get('rfq_id');

        $user = auth::id();
        
        // dd($user,$rfqSession);
    
        $quotations = Rfqresponse::where('user_id', $user)
                      ->where('rfq_id', $rfqSession)
                      ->get()
                      ->groupBy('rfq_id','user_id')
                      ->first();
        
        // dd($quotations);

        // dd($user);

        return view('admin.rfqresponse.userquote', compact('quotations'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usertenders(Request $request)
    {
        
        
        $user_id = Auth::id();

        $applied = Rfq::whereHas('rfqresponses',function($query){
            $query->where('user_id',Auth::id());
        })->get();

        // dd($applied);

        return view('admin.rfqresponse.userTenders', compact('applied'));

    }

    public function userquotations(Request $request,$quotes)
    {
        // dd($quotes);
        // Set the session 
        $request->session()->put('rfq_id', $quotes);
        //get the session
        $rfqSession = $request->session()->get('rfq_id');
        // dd($rfqSession);

        $quotes = User::has('rfqresponses')->get();

        $nonquotes = User::doesntHave('rfqresponses')->get();
       
        // dd($nonquotes);

        return view('admin.rfqresponse.quotelist', compact('quotes','nonquotes','rfqSession'));
    }

        public function userviewquotations(Request $request, $quote)
    {
        // Set the session 
        $request->session()->put('rfq_user_view',$quote);
        // dd($rfqSession);
        $rfqSession = $request->session()->get('rfq_user_view');

        $user = auth::id();
        
        // dd($user,$rfqSession);
    
        $quotations = Rfqresponse::where('user_id', $user)
                      ->where('rfq_id', $rfqSession)
                      ->get()
                      ->groupBy('rfq_id','user_id')
                      ->first();
        
        

        return view('admin.rfqresponse.userquote', compact('quotations'));
        
    }
 

    
}
