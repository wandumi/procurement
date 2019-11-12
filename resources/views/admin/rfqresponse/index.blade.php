@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | R.F.Q Response')

@section('title','R.F.Q')

@section('breadcrumb1', 'Response')

@section('breadcrumb2', 'View')

@section('headassest')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- Theme style -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">

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
                                <h2 class="card-title">Available</h2>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 mx-auto">

                                        
                                            
                                        <li class="list-group">
                                            @if($rfqs->isEmpty())
                                                <p class="alert alert-danger" style="text-align:center;">There are no Quotations</p>
                                            @else
                                                @foreach($rfqs as $replies)
                                                    <li class="list-group-item">

                                                        <a href="{{ route('viewQuotations', $replies->id ) }}">{{ $replies->request_title }}</a>
                                                        
                                                        <span class="pull-right badge badge-primary">
                                                            {{ $replies->rfqresponses->groupBy('user_id')->count() }}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            @endif
    
                                        </li>




                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <h2 class="card-title"> List of RFQ's </h2>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                    <li class="list-group">
                                        
                                            <li class="list-group">
                                            
                                                    @foreach($norfqs as $replies)
                                                        <li class="list-group-item">
    
                                                            {{ $replies->request_title }}
                                                            
                                                        </li>
                                                    @endforeach
                                               
        
                                            </li>

                                    </li>
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

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

        })
    </script>

@endsection