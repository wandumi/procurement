@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Social Media')

@section('title','Social Media')

@section('breadcrumb1', 'Social Media')

@section('breadcrumb2', 'View')

@section('headassest')
   

@endsection
@section('content')
    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                    <div class="card card-danger">
                            <div class="card-header">
                                <div class="col-md">
                                    <h2 class="card-title"><i class="fa fa-line-chart"></i> Facebook</h2>
                                </div>
                                <div class="col-md">
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#user">
                                        add New <i><span class="fa fa-user"></span></i>
                                    </button> --}}
                                </div>
                            </div>

                            <div class="card-body table-responsive">

                                    
                                

                            </div>

                            <div class="card-footer">
                                    <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                        
                                    </div>
                            </div>
                            {{-- {!! $chart->container() !!} --}}

                    </div>
                    <!-- /.card -->

                </div>

                <div class="col-md-6">

                    <div class="card card-danger">
                            <div class="card-header">
                                <div class="col-md">
                                    <h2 class="card-title"><i class="fa fa-line-chart"></i> Twitter</h2>
                                </div>
                                <div class="col-md">
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#user">
                                        add New <i><span class="fa fa-user"></span></i>
                                    </button> --}}
                                </div>
                            </div>

                            <div class="card-body table-responsive">

                                    


                            </div>

                            <div class="card-footer">
                                    <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                    
                                    </div>
                            </div>
                       

                    </div>
                    <!-- /.card -->

                </div>

            </div>
            
        </div>

    </div>
    <!-- /.content -->

@endsection





