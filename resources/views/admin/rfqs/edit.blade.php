@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Edit ')

@section('title','R.F.Q Edit')

@section('breadcrumb1', 'Edit')

@section('breadcrumb2', 'View')

@section('headassest')
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{--<div class="col-md-10 mx-auto">--}}
                <div class="col-md-12 mx-auto">
                
                    
                
                <div class="row">


                    <div class="col-md-6">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <div class="pull-left">
                                    <h2>{{ $rfqs->request_title }} </h2>
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

                                        <form action="{{ route('rfqs.update', $rfqs->id) }}" 
                                                        method="POST" enctype="multipart/form-data">

                                        @csrf

                                        {{ method_field('PUT') }}

                                        <input type="hidden" name="referenceNo" value="{{ $rfqs->reference_no }}">

                                        <div class="form-group">
                                            <label for="request_type">Request Type</label>

                                                <select name="requesttype" id="" class="form-control {{ $errors->has('requesttype') ? 'is-invalid' : '' }}">
                                                    <option value="" disabled selected>Please select Request Type</option>
                                                    @foreach($requesttypes as $requesttype)
                                                        <option value="{{ $requesttype->id }}" 
                                                        @if($requesttype->id === $rfqs->requesttypes_id)
                                                            selected
                                                        @endif
                                                            >{{ $requesttype->name }}</option>
                                                    @endforeach
                                                </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="procurement_category">Procurement Category</label>

                                            <select name="pcategory" id="" class="form-control {{ $errors->has('pcategory') ? 'is-invalid' : '' }}">
                                                <option value="" disabled selected>Please select Procurement Category</option>
                                                @foreach($procategories as $pcategory)
                                                    <option value="{{ $pcategory->id }}"
                                                        @if($pcategory->id === $rfqs->pcategories_id)
                                                            selected
                                                        @endif>
                                                        {{ $pcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="supplier_type">Supplier Type</label>

                                            <select name="suppliertype" id="" class="form-control {{ $errors->has('suppliertype') ? 'is-invalid' : '' }}">
                                                <option value="" disabled selected>Please select Supplier Type</option>
                                                @foreach($suppliertypes as $suppliertype)
                                                    <option value="{{ $suppliertype->id }}" 
                                                        @if($suppliertype->id === $rfqs->suppliertypes_id)
                                                            selected
                                                        @endif>
                                                    {{ $suppliertype->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="request_title">Request Title</label>
                                            <input type="text" name="request_title" id="" class="form-control 
                                            {{ $errors->has('request_title') ? 'is-invalid' : '' }}" value="{{ $rfqs->request_title  }}">
                                            @if($errors->has('request_title'))
                                                <span class="invalid-feedback">
                                                  <strong>
                                                        {{ $errors->first('request_title') }}
                                                  </strong>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="open_date">Open Date & Time</label>
                                            <input type="text" class="date form-control {{ $errors->has('open_date') ? 'is-invalid' : '' }}"
                                                   name="open_date" value="{{ $rfqs->open_date_time }}">
                                            {{-- <input class="form-control {{ $errors->has('open_date') ? 'is-invalid' : '' }}" 
                                                   id="" name="closing_date" placeholder="DD/MM/AA" 
                                                   value="
                                                       @if (isset($rfqs->open_date_time))
                                                           {!!date('d-m-Y', strtotime($rfqs->open_date_time))!!}
                                                       @endif"  
                                                   type="text" > --}}

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
                                            <label for="estimated_amount">Estimated Amount</label>
                                            <input type="text" class="form-control {{ $errors->has('estimated_amount') ? 'is-invalid' : '' }}"
                                                   name="estimated_amount" value="{{ $rfqs->estimated_amount }}">
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
                                            <input type="text" class="form-control {{ $errors->has('available_budget') ? 'is-invalid' : '' }}"
                                                   name="available_budget" value="{{ $rfqs->available_budget }}">
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
                                                   name="account_code" value="{{ $rfqs->account_code }}">
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

                                            <select name="status" id="" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                                <option value="" disabled selected>Please select R.F.Q Status</option>
                                                @foreach($rfqstatuses as $rfqstatus)
                                                    <option value="{{ $rfqstatus->id }}" 
                                                        @if($rfqstatus->id === $rfqs->status_id)
                                                            selected
                                                        @endif>
                                                        {{ $rfqstatus->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="closing_date">Closing Date & Time</label>
                                            <input type="text" class="date form-control {{ $errors->has('closing_date') ? 'is-invalid' : '' }}"
                                                   name="closing_date" value="{{ $rfqs->closing_date_time }}">
                                           
                                            {{-- <input class="form-control {{ $errors->has('closing_date') ? 'is-invalid' : '' }}" 
                                                    id="" name="closing_date" placeholder="DD/MM/AA" 
                                                    value="
                                                        @if (isset($rfqs->closing_date_time))
                                                            {!!date('d-m-Y', strtotime($rfqs->closing_date_time))!!}
                                                        @endif"  
                                                    type="text"> --}}

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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="message" id="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" >
                                    {{ $rfqs->content_of_rfq }}
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="uploadfile">Uploaded Documents</label><br>
                                <a href="{{ Storage::disk('local')->url($rfqs->uploadfile) }} " 
                                width="100%" height="600px" class="">{{ $rfqs->uploadfile }}</a>

                            </div>
                            <div class="form-group">
                                {{-- <label for="uploadfile">Upload Documents</label> --}}

                                        <input type="file" class="form-control {{ $errors->has('uploadfile') ? 'is-invalid' : '' }}"
                                               id="uploadfile" name="uploadfile" value="{{ $rfqs->uploadfile }}">

                                        @if($errors->has('uploadfile'))
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('uploadfile') }}
                                                </strong>
                                            </span>
                                        @endif

                            </div>
                        </div>

                        <div class="col-md-12">
                            
                        </div>

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


                        </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">

                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <h2 class="card-title"> Comment Section </h2>
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
                                                       
                                                                <select name="status" id="" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                                                    <option value="" disabled selected>Please select R.F.Q Status</option>
                                                                    @foreach($rfqstatuses as $rfqstatus)
                                                                        <option value="{{ $rfqstatus->id }}" 
                                                                            @if($rfqstatus->id === $rfqs->status_id)
                                                                                selected
                                                                            @endif disabled>
                                                                            {{ $rfqstatus->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            
                                                        </h6>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 style="color:white;background-color:green;padding:1.2em;text-align:center;">Request Approval</h6>
                                                    </div>
                                                </div>
                                                    <!-- Second Row -->
                                                <div class="row mb-3 mt-3 ">

                                                    <div class="col-md-4">
                                                        <h6 style="font-size:18px;color:white; text-align:center; padding:1.2em;font-weight:900"> NOTE / MOTIVATION</h6>
                                                    </div>
                                                    
                                                    <div class="col-md-8 " style="height:300px; overflow-y:scroll;">
                                                        
                                                            
                                                                @foreach ($rfqs->comments as $answer)
                                                                    
                                                                <div class="direct-chat-messages bg-white" style="height:180px !important;">
                                                                        <!-- Message. Default to the left -->
                                                                        <div class="direct-chat-msg">
                                                                        <div class="direct-chat-infos clearfix">
                                                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                                        </div>
                                                                        <!-- /.direct-chat-infos -->
                                                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/avatar.png') }}" alt="Message User Image">
                                                                        <!-- /.direct-chat-img -->
                                                                        <div class="direct-chat-text">
                                                                            {{ $answer->body }}
                                                                        </div>
                                                                        <!-- /.direct-chat-text -->
                                                                        </div>
                                                                        <!-- /.direct-chat-msg -->
                                                    
                                                                        <!-- Message to the right -->
                                                                        <div class="direct-chat-msg right">
                                                                        <div class="direct-chat-infos clearfix">
                                                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                                        </div>
                                                                        <!-- /.direct-chat-infos -->
                                                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/avatar.png') }}" alt="Message User Image">
                                                                        <!-- /.direct-chat-img -->
                                                                        <div class="direct-chat-text">
                                                                            You better believe it!
                                                                        </div>
                                                                        <!-- /.direct-chat-text -->
                                                                        </div>
                                                                        <!-- /.direct-chat-msg -->
                                                                    </div>
                                                                    <!--/.direct-chat-messages-->
                                                    
                                                                    
                                
                                                                @endforeach
                   
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    
                                                    
                                                <div>
                                                    
                                                </div>
                                                    <!-- Third Row -->
                                                </div>
                                                <div class="row pt-1 pb-3">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-8">
                                                        {{-- <button class="form-control btn-danger">Send</button> --}}
                                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-default">
                                                                Add Comment 
                                                        </button>
                                                    </div>

                                                    
                                                </div>

                                            
                                            </div>

                                        </div>
                                        
                                        <div class="row pt-3">
                                            <div class="col-md-12 p-lg-4" style="font-size: 2em; text-align:center; background-color:brown;color:white;">REQUEST / BID BUILDER</div>
                                            {{-- <div class="col-md-4">Ref, No R-FQ0025</div> --}}
                                        </div>

                                        

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->



                </div>


                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Comments </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                

                                    <div class="col-md-12">
                                        
                                        <!-- DIRECT CHAT PRIMARY -->
                                        <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                                            <div class="card-header">
                                            <h3 class="card-title">Note/Motivation</h3>
                            
                                            <div class="card-tools">
                                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                                        data-widget="chat-pane-toggle">
                                                <i class="fas fa-comments"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="height:60%; overflow-y:scroll;">
                                                    
                                            @foreach ($rfqs->comments as $answer)
                                                <!-- Conversations are loaded here -->
                                                <div class="direct-chat-messages" style="height:180px !important;">
                                                    <!-- Message. Default to the left -->
                                                    <div class="direct-chat-msg">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="{{ asset('admin/dist/img/avatar.png') }}" alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        {{ $answer->body }}
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                    </div>
                                                    <!-- /.direct-chat-msg -->
                                
                                                    <!-- Message to the right -->
                                                    <div class="direct-chat-msg right">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="{{ asset('admin/dist/img/avatar.png') }}" alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        You better believe it!
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                    </div>
                                                    <!-- /.direct-chat-msg -->
                                                </div>
                                                <!--/.direct-chat-messages-->
                                
                                                
                                            @endforeach
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <form action="{{ route('addcomment', $rfqs->id) }}" method="post">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="text" name="comment" placeholder="Type Message ..." class="form-control">
                                                        
                                                    </div>
                                                {{-- </form> --}}
                                            </div>
                                            <!-- /.card-footer-->
                                        </div>
                                        <!--/.direct-chat -->
                                        
                                    </div>
                                    <!-- /.col -->



                            </div>
                            <div class="modal-footer justify-content-between">
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                                
                                <button type="submit" class="btn btn-primary btn-block">Send</button>
                                
                            </div>

                            </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('chartsscripts')


    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
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

    <script>
        $(function () {
            // Summernote
            $('#message').summernote({
                height: 200,
            });
        })
    </script>

@endsection

