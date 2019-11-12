@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Request ')

@section('title',"R.F.Q ")

@section('breadcrumb1', 'R.F.Q')

@section('breadcrumb2', 'Show')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger card-outline">
                        <div class="card-header ">
                            <div class="pull-left">
                            <h2>{{ ucwords($rfqs->request_title) }}</h2>
                            </div>
                            <div class="pull-right">
                            <a class="btn btn-danger" href="{{ route('rfqs.index') }}"> Back</a>
                            </div>
                        </div><!-- /.card-header -->
                        
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>

            
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                           Basic Information
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                            <table class="table table-responsive">
                                <tbody>
                                   
                                    <tr>
                                        <td style="font-weight:900;">Request Type</td>
                                        <td>
                                            @foreach($requesttypes as $requesttype)
                                        
                                                @if($requesttype->id === $rfqs->requesttypes_id)
                                                    {{ $requesttype->name }}
                                                @endif
                                                
                                           @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:900;">Procurement Category </td>
                                            <td> 
                                                @foreach($suppliertypes as $suppliertype)
                                        
                                                    @if($suppliertype->id === $rfqs->suppliertypes_id)
                                                        {{ $suppliertype->name }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:900;">Supplier Type </td>
                                        <td>
                                            @foreach($procategories as $pcategory)
                                            
                                                @if($pcategory->id === $rfqs->pcategories_id)
                                                    {{ $pcategory->name }}
                                                @endif
                                                
                                            @endforeach
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                           Prices (In Rands)
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <table class="table table-responsive">
                                <tbody>
                                       
                                    <tr>
                                        <td style="font-weight:900;">Estimated Amount</td>
                                        <td>{{ $rfqs->estimated_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:900;">Available Budget</td>
                                        <td>{{ $rfqs->available_budget }} </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:900;">Account Code</td>
                                        <td>{{ $rfqs->account_code }} </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:900;">Status</td>
                                        <td>
                                            @foreach($rfqstatuses as $status)
                                                    @if($status->id === $rfqs->status_id)
                                                        @if($status->name === 'Published')
                                                            <span class="badge badge-success p-2">
                                                                {{ $status->name }}
                                                            </span>
                                                        @elseif($status->name === 'Draft')
                                                            <span class="badge badge-warning p-2">
                                                                {{ $status->name }}
                                                            </span>
                                                        @elseif($status->name === 'Pending') 
                                                            <span class="badge badge-info p-2">
                                                                {{ $status->name }}
                                                            </span>
                                                        @endif
                                                    @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                       
                                </tbody>
                            </table>
                            
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fa fa-clock"></i>
                          Duration
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-responsive">
                               
                            <tbody>
                                <tr>
                                    <td style="font-weight:900;">Open Date</td>
                                    <td>{{ date ('M j, Y', strtotime($rfqs->open_date_time )) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:900;">Closing Date</td>
                                    <td>{{ date ('M j, Y', strtotime($rfqs->closing_date_time )) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:900;">Created Date</td>
                                    <td>{{ date ('M j, Y', strtotime($rfqs->created_at->diffForHumans() )) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:900;">Created Time</td>
                                    <td>{{ date ('H:i a ', strtotime($rfqs->created_at)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                            
                            
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">

                    <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                  Summary (Next Process)
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
        
                                    <p>{!! $rfqs->content_of_rfq !!}</p>
                                    
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    
            </div>

            <div class="row">
                    <div class="col-md-12">
                            <div class="card card-danger card-outline">
                                <div class="card-header ">
                                    <h2> Uploaded File </h2>
                                </div><!-- /.card-header -->
                                <div class="card-body" style="height:100%;">
                                        
                                            <iframe src=" {{ Storage::disk('local')->url($rfqs->uploadfile) }} " 
                                            width="100%" height="600px"></iframe>
                                            
                                            {{-- Uploaded File</a><br> --}}
                                        
                                            {{-- <iframe src="{{ asset('storage/store'. $rfqs->uploadfile ) }}" 
                                            alt="file" width="500px" height="500px"> <br>
            
                                            <iframe src="{{ URL::to('/') }}/storage/store/{{ $rfqs->uploadfile }}" 
                                            class="img-thumbnail" height="8000px"
                                            alt="file"> --}}
                                    
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
            </div>
          

        </div>




            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection