<?php

namespace App\Http\Controllers;

use App\Pcategory;
use App\Rfq;
use App\Requesttype;
use App\Rfqstatus;
use App\Suppliertype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RfqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfqs = Rfq::with('comments')->get();
        // dd($rfqs);
        $requesttypes = Requesttype::all();
        $rfqstatuses = Rfqstatus::all();
        //dd($requesttypes);
        return view('admin.rfqs.index', compact('rfqs','requesttypes','rfqstatuses'));
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
        $rfqstatuses = Rfqstatus::all();

        $Rfqs = Rfq::all();
        // dd($Rfqs);
        //dd($requesttypes);
        return view('admin.rfqs.create', compact('Rfqs','requesttypes','procategories','suppliertypes','rfqstatuses'));
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

        // dd(Carbon::parse($request->open_date));
        // $refferenceNo = Rfq::orderBy('id', 'desc')->pluck('id')->first();
        function generateKey(){
            $keylength = 8;
            $string = "123456789abcdefghijklmonpqrstuvwxyz/$";
            $randStr = substr(str_shuffle($string), 0, $keylength);

            return $randStr;
        }

        function generateTime(){
            $randStr1 = uniqid('RFQ::', true);
            $randStr = uniqid('RFQ::').time();
            return $randStr;
        }
        
        // dd(generateKey(), generateTime());

        $refferenceNo = 'RFQ::'.generateKey();
        
        // dd($refferenceNo);

        $this->validate($request, [
              'requesttype' => 'required|not_in:0',
              'pcategory' => 'required|not_in:0',
              'suppliertype' => 'required|not_in:0',
              'request_title' => 'required|string|min:10|unique:rfqs,request_title',
              'open_date'      => 'required|date|before:closing_date',
              'estimated_amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
              'available_budget' => 'required|regex:/^\d+(\.\d{1,2})?$/',
              'account_code' => 'required',
              'closing_date' => 'required|date|after:open_date',
              'message' => 'required',
            //   'status' => 'required',
              'uploadfile' => 'file|mimes:pdf',

        ]);


        // if(request()->hasFile('uploadfile')) {
        //     request()->validate([
        //         'uploadfile' => 'file|image|max:5000',
        //     ]);
        // }
        

          $rfq = new rfq;
          $rfq->user_id = auth()->id();
          $rfq->reference_no = $refferenceNo;
          $rfq->requesttypes_id = $request->requesttype;
          $rfq->pcategories_id =  $request->pcategory;
          $rfq->suppliertypes_id = $request->suppliertype;
          $rfq->request_title = $request->request_title;
          $rfq->open_date_time  = Carbon::parse($request->open_date);
          $rfq->estimated_amount = $request->estimated_amount;
          $rfq->available_budget = $request->available_budget;
          $rfq->account_code = $request->account_code;
          $rfq->closing_date_time = Carbon::parse($request->closing_date);
          $rfq->content_of_rfq = $request->message;
          $rfq->status_id = 3;
          
        //   if ($request->hasFile('uploadfile')){
        //         $file = $request->file('uploadfile');
        //         $extension = $file->getClientOriginalExtension(); //get the file extensions
        //         $filesize = $file->getClientSize();
        //         $filename = time().'.'.$extension;
        //         $file->move('Rfqsfiles/rfqs/', $filename); 
        //         $rfq->uploadfile = $filename;
        //         //$uploaded = $request->uploadfile->store('public');    
        //     };

            if ($request->hasFile('uploadfile')){
                $file = $request->file('uploadfile');
                $extension = $file->getClientOriginalExtension(); //get the file extensions
                // $filesize = $file->getClientSize();
                $filename = time().'.'.$extension;
                $upload = $file->storeAs('public/store', $filename);
                $rfq->uploadfile = $upload;
                //$uploaded = $request->uploadfile->store('public');    
            };

          $rfq->save();

          return redirect()->route('rfqs.index')
                 ->with('message','R.F.Q "'. strtoupper($request->request_title) .'" has been added Successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rfq  $rfq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requesttypes = Requesttype::all();
        $procategories = Pcategory::all();
        $suppliertypes = Suppliertype::all();
        $rfqstatuses = Rfqstatus::all();

        $rfqs = Rfq::where('id', $id)->first();
       
        // dd($rfqs);
        // return view('admin.rfqrequest.show', compact('rfqs','rfqstatuses'));
        return view('admin.rfqs.show', compact('rfqs','requesttypes','procategories','suppliertypes','rfqstatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rfq  $rfq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requesttypes = Requesttype::all();
        $procategories = Pcategory::all();
        $suppliertypes = Suppliertype::get();
        $rfqstatuses = Rfqstatus::all();

        // dd($suppliertypes);

        $rfqs = Rfq::where('id', $id)->first();
        // dd($rfqs);
        //dd($requesttypes);
        return view('admin.rfqs.edit', compact('rfqs','requesttypes','procategories','suppliertypes','rfqstatuses'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rfq  $rfq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //    dd($request->all());

      $rfq = rfq::findOrfail($id);
      
      $rfq->user_id = auth()->id();
      $rfq->reference_no = $request->referenceNo;
      $rfq->requesttypes_id = $request->requesttype;
      $rfq->pcategories_id =  $request->pcategory;
      $rfq->suppliertypes_id = $request->suppliertype;
      $rfq->request_title = $request->request_title;
      $rfq->open_date_time  = Carbon::parse($request->open_date);
      $rfq->estimated_amount = $request->estimated_amount;
      $rfq->available_budget = $request->available_budget;
      $rfq->account_code = $request->account_code;
      $rfq->closing_date_time = Carbon::parse($request->closing_date);
      $rfq->content_of_rfq = $request->message;
      $rfq->status_id = $request->status;
      // $rfq->uploadfile = $uploaded;

    //   if ($request->hasFile('uploadfile')){
    //         $file = $request->file('uploadfile');
    //         $extension = $file->getClientOriginalExtension(); //get the file extensions
    //         $filename = time().'.'.$extension;
    //         $file->move('Rfqfiles/rfqs', $filename); 
    //         $rfq->uploadfile = $filename;
    //     };

      $rfq->save();

      return redirect()->route('rfqs.index')
             ->with('message','R.F.Q "'. strtoupper($request->request_title) .'" has been Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rfq  $rfq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rfq $rfq)
    {
        $rfq->delete();

        return redirect()->route('rfqs.index')
                 ->with('message','R.F.Q "'. strtoupper($rfq->request_title) .'" has been added Successfuly');

    }
}
