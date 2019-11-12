@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Create ')

@section('title','R.F.Q Request ')

@section('breadcrumb1', 'Create')

@section('breadcrumb2', 'View')

@section('headassest')
      <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{--<div class="col-md-10 mx-auto">--}}
                <div class="col-md-12 mx-auto">
                
                    
                
                <div class="row">


                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <div class="pull-left">
                                    <h2>R.F.Q Form </h2>
                                </div>
                                <div class="pull-right">
                                <a class="btn btn-danger" href="{{ route('rfqs.index') }}"> Back</a>
                                </div>
                            </div><!-- /.card-header -->
                            <div>
                                @include('admin.layouts.includes.partials.success')
                            </div>
                            <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">

                                <form action="{{ route('rfqs.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <label for="request_type">Request Type</label>

                                        <select name="requesttype" id="" class="form-control {{ $errors->has('requesttype') ? 'is-invalid' : '' }}">
                                            <option value="" disabled selected>Please select Request Type</option>
                                            @foreach($requesttypes as $requesttype)
                                                <option value="{{ $requesttype->id }}" {{ old('requesttype') == $requesttype->id ? 'selected' : ''}}>{{ $requesttype->name }}</option>
                                            @endforeach
                                        </select>

                                </div>

                                <div class="form-group">
                                    <label for="procurement_category">Procurement Category</label>

                                    <select name="pcategory" id="" class="form-control {{ $errors->has('pcategory') ? 'is-invalid' : '' }}">
                                        <option value="" disabled selected>Please select Procurement Category</option>
                                        @foreach($procategories as $pcategory)
                                            <option value="{{ $pcategory->id }}" {{ old('pcategory') == $pcategory->id ? 'selected' : ''}}>{{ $pcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                

                                <div class="form-group">
                                    <label for="supplier_type">Supplier Type</label>

                                    <select name="suppliertype" id="" class="form-control {{ $errors->has('suppliertype') ? 'is-invalid' : '' }}">
                                        <option value="" disabled selected>Please select Supplier Type</option>
                                        @foreach($suppliertypes as $suppliertype)
                                            <option value="{{ $suppliertype->id }}" {{ old('suppliertype') == $suppliertype->id ? 'selected' : ''}}>{{ $suppliertype->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="request_title">Request Title</label>
                                    <input type="text" name="request_title" id="" class="form-control 
                                    {{ $errors->has('request_title') ? 'is-invalid' : '' }}" value="{{ old('request_title') }}">
                                    @if($errors->has('request_title'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('request_title') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>

                                

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estimated_amount">Estimated Amount</label>
                                    <input type="text" class="decimal-number form-control {{ $errors->has('estimated_amount') ? 'is-invalid' : '' }}"
                                            name="estimated_amount" value="{{ old('estimated_amount') }}">
                                    @if($errors->has('estimated_amount'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('estimated_amount') }}
                                                </strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="available_budget">Available Budget</label>
                                    <input type="text" class="int-number form-control {{ $errors->has('available_budget') ? 'is-invalid' : '' }}"
                                            name="available_budget" value="{{ old('available_budget') }}" >
                                    @if($errors->has('available_budget'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('available_budget') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="account_code">Account Code</label>
                                    <input type="text" class="form-control {{ $errors->has('account_code') ? 'is-invalid' : '' }}"
                                            name="account_code" value="{{ old('account_code') }}" >
                                    @if($errors->has('account_code'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('account_code') }}
                                                </strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="procurement_category">Request Status</label>

                                    <select name="status" id="" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" disabled>
                                        <option value="" disabled selected>Draft</option> 
                                        @foreach($rfqstatuses as $rfqstatus)
                                            <option value="{{ $rfqstatus->id }}">
                                                   {{ $rfqstatus->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                
                            </div>
                        </div>
                        
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="message" id="editor1" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" >
                                            {{ old('message') }}
                                        </textarea>
                                        @if($errors->has('message'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('message') }}
                                                </strong>
                                            </span>
                                    @endif
                                    </div>
                                </div>
                        </div>
                        

                        <div class="row pt-3">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="open_date">Open Date & Time</label>
                                            <input type="text" class="date form-control {{ $errors->has('open_date') ? 'is-invalid' : '' }}"
                                                    name="open_date" value="{{ old('open_date')  }}">
                                            @if($errors->has('open_date'))
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $errors->first('open_date') }}
                                                    </strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="closing_date">Closing Date & Time</label>
                                            <input type="text" class="date form-control
                                            {{ $errors->has('closing_date') ? 'is-invalid' : '' }}"
                                                    name="closing_date" value="{{ old('closing_date') }}">
                                            @if($errors->has('closing_date'))
                                                <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $errors->first('closing_date') }}
                                                        </strong>
                                                    </span>
                                            @endif
                                        </div>
                                </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="uploadfile">Upload Documents</label>
    
                                            <input type="file" class="form-control {{ $errors->has('uploadfile') ? 'is-invalid' : '' }}"
                                                    id="uploadfile" name="uploadfile" value="{{ old('uploadfile') }}">
    
                                            @if($errors->has('uploadfile'))
                                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $errors->first('uploadfile') }}
                                                    </strong>
                                                </span>
                                            @endif
    
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-12 pt-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class=" btn btn-block btn-default">Add Fields</button>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <button class=" btn btn-block btn-danger" name="submit">Save</button>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                       
                        </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    {{-- <div class="col-md-6">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <h2>Comment Section </h2>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="row" style="background-color:grey;">
                                            <div class="col-md-12">
                                                <div class="row pb-1 pt-3">
                                                    <div class="col-md-4">
                                                        <h6 style="font-size:18px;color:white; text-align:center; padding:1.2em;font-weight:900">INITIATOR</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 style="color:white;background-color:green;padding:1.2em;text-align:center;">User Code</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 style="color:white;background-color:green;padding:1.2em;text-align:center;">Ref.No::RFQ0025</h6>
                                                    </div>
                                                </div>
                                                    <!--First rolw -->
                                                <div class="row pb-1">

                                                    <div class="col-md-4">
                                                        <h6 style="font-size:18px;color:white; text-align:center; padding:1.2em; font-weight:900">STATUS</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 style="color:white;background-color:green;padding:1.2em;text-align:center;">
                                                        
                                                                {{ ucwords($rfqstatus->name) }} </h6>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 style="color:white;background-color:green;padding:1.2em;text-align:center;">Request Approval</h6>
                                                    </div>
                                                </div>
                                                    
                                                
                                                    <!-- Second Row -->
                                                    <div class="row mb-3">
    
                                                        <div class="col-md-4">
                                                            <h6 style="font-size:18px;color:white; text-align:center; padding:1.2em;font-weight:900"> NOTE / MOTIVATION</h6>
                                                        </div>
                                                        
                                                        <div class="col-md-8">
                                                            <span class="mb-3">
                                                                <textarea name="comment" id="comment" class="form-control" rows="5">
                                                                    Comment goes here...
                                                                </textarea>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row pt-1 pb-3">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-8">
                                                            <button class="form-control btn-danger">Send</button>
                                                        </div>
                                                    </div>
                                                    <!-- end fo the comment section -->
                                                
                                            </div>

                                        </div>
                                        
                                        <div class="row pt-3">
                                            <div class="col-md-12 p-lg-4" style="font-size: 2em; text-align:center; background-color:brown;color:white;">REQUEST / BID BUILDER</div>
                                            {{-- <div class="col-md-4">Ref, No R-FQ0025</div> 
                                        </div>

                                        {{-- <div class="row pt-3">
                                            <div class="col-md-12">
                                                <p>FORM BUILDER</p>
                                            </div>

                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-md-3">
                                                <button>Submit</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Deviation</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Validate</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Release</button>
                                            </div>
                                        </div> 



                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div> --}}
                        <!-- /.col -->



                </div>




            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('chartsscripts')

    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
    rel = "stylesheet">
    <!-- This is jquery-ui for dates -->
    <script src="{{ asset('admin/plugins/jqueryUI/jquery-ui.min.js') }}"></script>
    <script>
        $( function() {
            $('.date').datepicker({
                format: '{{ config('app.date_format_js') }}'
            });        
        });
    </script>


    <!--Summer note cdn -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet"> 
     <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script> 
    {{-- <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}

    <script>
        $(function () {
            // Summernote
            $('#editor1').summernote({
                height: 200,
            });
        })
    </script>

   
@endsection

