@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Request ')

@section('title',"R.F.Q ")

@section('breadcrumb1', 'R.F.Q')

@section('breadcrumb2', 'Show')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{--<div class="col-md-10 mx-auto">--}}
                <div class="col-md-12 mx-auto">
                
                <div class="row">

                    <div class="col-md-5">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <div class="pull-left">
                                <h4 class="">{{ ucwords($viewRFQ->request_title) }}</h4>
                                </div>
                                <div class="pull-right">
                                <a class="btn btn-danger" href="{{ route('tender.index') }}"> Back</a>
                                </div>
                            </div><!-- /.card-header -->
                            <div>
                                @include('admin.layouts.includes.partials.success')
                                {{-- <span>{{ $rfqSession }}</span> --}}
                            </div>
                            <div class="card-body">
                                    
                                    <div class="row mb-3">
                                        
                                        <div class="col-md-6">
                                            
                                            
                                        
                                            <div class="form-group pb-3">
                                                <label for="request_title">Request Title</label><br>
                                               <span>{{ $viewRFQ->request_title }}</span>
                                                
                                            </div>
    
                                            <div class="form-group ">
                                                <label for="open_date">Open Date & Time</label><br>
                                               <span>{{ $viewRFQ->open_date_time }}</span>
                                               
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
    
                                                <div class="form-group pb-3">
                                                    <label for="request_title">Request Type</label><br>
                                                    
                                                    {{-- {{ $rfq->requesttypes_id }} --}}
                                                    @foreach($requesttypes as $requesttype)
                                                        
                                                            @if($requesttype->id === $viewRFQ->requesttypes_id)
                                                                {{ $requesttype->name }}
                                                            @endif
                                                            
                                                    @endforeach
                                                </div>
        
                                                <div class="form-group">
                                                    <label for="open_date">Bid Closing In (Days Hours Minutes)</label><br />
                                                    <span>
                                                        {{ ( new \Carbon\Carbon() )->diffInDays($viewRFQ->open_date_time) }} :
                                                        {{ ( new \Carbon\Carbon() )->diffInHours($viewRFQ->open_date_time) }} :
                                                        {{ ( new \Carbon\Carbon() )->diffInMinutes($viewRFQ->open_date_time) }} 
                                                        {{-- @if(( new Carbon\Carbon() )->diffInHoures($viewRFQ->open_date) < 5)
                                                            <strong>New!</strong>
                                                        @endif --}}
                                                        {{-- {{ (\Carbon\Carbon::parse($view->open_date_time))->floatDiffInDays($viewRFQ->closing_date_time) }} --}}
                                                    </span>
                                                </div>

                                                
        
                                        </div>

                                    </div>

                                    <div class="row">
                                       
                                        <div class="col-md-12" style="padding-bottom:10%;">
                                                <iframe src=" {{ Storage::disk('local')->url($viewRFQ->uploadfile) }} " 
                                                        width="100%" height="600px"></iframe>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                        <a href="download{{ $viewRFQ->id }}">
                                                <button class="btn btn-info btn-block fa fa-download">Download</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-warning btn-block fa fa-print">Print</button>
                                        </div>
                                    </div>
                                    

                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-7">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <div class="pull-left">
                                    <h2 class="card-title"> Over Due </h2>
                                </div>
                                
                                <div class="pull-right">
                                    <h5>{{ $viewRFQ->reference_no }}</h5>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                        
                                                        
                                                        {{-- <form name="add_name" id="add_name">  --}}
                                                        <form method="POST" action="{{ route('rfqresponse.store') }}" 
                                                              id="add_name" name="add_name">
                                                                @csrf 
                                            
                                                        <div>
                                                            @include('admin.layouts.includes.partials.success')
                                                        </div>
                                                        <div>
                                                            @include('admin.layouts.includes.partials.errors')
                                                        </div>

                                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                        </div>
                                            
                                            
                                                        <div class="alert alert-success print-success-msg" style="display:none">
                                                        <ul></ul>
                                                        </div>

                                                        <div class="table-responsive">  
                                                            <table class="table table-bordered table-striped" id="dynamic_field"> 
                                                                <thead>
                                                                    <tr style="font-weight:bold">
                                                                        <th>#</th>
                                                                        <th>Product Name</th>
                                                                        <th>Description</th>
                                                                        <th>Quantity</th>
                                                                        <th>Item Price</th>
                                                                        <th>Total Cost</th>
                                                                        <th>
                                                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                                                        </th>
                                                                    </tr>
                                                                </thead> 
                                                                <tbody>
                                                                       
                                                                        <tr>  
                                                                                <td></td>
                                                                                <td>
                                                                                    <input type="text" name="product_name[0]" class="form-control name_list" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="description[0]" class="form-control name_list" />
                                                                                </td>
                                                                                <td width="5%">
                                                                                    <input type="text" name="quantity[0]" class="form-control name_list" />
                                                                                </td>
                                                                                <td >
                                                                                    <input type="text" name="item_cost[0]" class="form-control name_list" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="total_cost[0]" class="form-control name_list" />
                                                                                </td>  
                                                                                <td>
                                                                                    <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Default</button>
                                                                                </td>
                                                                            </tr> 
                                                                </tbody>
                                                                 
                                                            </table>  
                                                              
                                                        </div>
                                                        
                                                </div> 
                                                <div class="col-md-12">
                                                        <div>
                                                            <input type="hidden" value="{{ $viewRFQ->id }}" name="rfq_id">
                                                        </div>
                                                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block">Submit</button>
                                                    </div>
                                            </form>  
                                        </div>
                                    </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->



                </div>




            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('chartsscripts')

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqueryUI/jquery-ui.min.js') }}"></script>
    <script>
        $( function() {
            $('.date').datepicker();        
        });
    </script>
    

    <script type="text/javascript">
        // $(document).ready(function(){ 

        // var postURL = "<?php echo url('saveData'); ?>";

        var i=0;  


        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append(
                '<tr id="row'+i+'" class="dynamic-added">'+
                    '<td></td>'+
                    '<td>'+
                        '<input type="text" name="product_name['+i+']" class="form-control name_list" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="description['+i+']" class="form-control name_list" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="quantity['+i+']" class="form-control name_list" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="item_cost['+i+']" class="form-control name_list" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="total_cost['+i+']" class="form-control name_list" />'+
                    '</td>'+
                        '<td>'+
                            '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                        '</td>'+
                    '</tr>'
                    
                );  
        });  

        $('tbody').on('click','.remove', function(){
                $(this).parent().parent().remove();
            });

          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  


        //   $.ajaxSetup({
        //       headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //       }
        //   });


        //   $('#submit').click(function(){            
        //        $.ajax({  
        //             url:postURL,  
        //             method:"POST",  
        //             data:$('#add_name').serialize(),
        //             type:'json',
        //             success:function(data)  
        //             {
        //                 if(data.error){
        //                     printErrorMsg(data.error);
        //                 }else{
        //                     i=1;
        //                     $('.dynamic-added').remove();
        //                     $('#add_name')[0].reset();
        //                     $(".print-success-msg").find("ul").html('');
        //                     $(".print-success-msg").css('display','block');
        //                     $(".print-error-msg").css('display','none');
        //                     $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
        //                 }
        //             }  
        //        });  
        //   });  


        //   function printErrorMsg (msg) {
        //      $(".print-error-msg").find("ul").html('');
        //      $(".print-error-msg").css('display','block');
        //      $(".print-success-msg").css('display','none');
        //      $.each( msg, function( key, value ) {
        //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //      });
        //   }
        // });  
    </script> 
 
@endsection