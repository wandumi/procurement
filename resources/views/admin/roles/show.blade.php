@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Roles ')

@section('title','Show Roles')

@section('breadcrumb1', 'Show')

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
            <div class="col-md-10 mx-auto">
            <div class="row">
                    
                <div class="col-lg-12 margin-tb mb-3 mt-5">
                    <div class="pull-left">
                        <h2>{{ ucwords($roles->name) }}</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>
                <div>
                    
                    @include('admin.layouts.includes.partials.success')
                </div>
            </div>
            <div class="row">
                    

                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <h2 class="card-title" style="font-weight: bold; font-size:24px;">Basic Information</h2>     
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                 <div>
                                     {{ $roles->display_name }}
                                 </div>
                                 <div class="mt-4">
                                     <h3>Roles</h3>
                                     <ul>
                                        @if($roles->permissions->count())
                                            @foreach ($roles->permissions as $role)
                                                <li>{{ ucwords($role->name) }} | ({{ $role->description }}) </li>
                                            @endforeach
                                        @else
                                            <p style="text-align:center;">There are no Roles assigned to <strong>{{ $user->name }}</strong></p>
                                        @endif
                                    </ul>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
        
            </div>
            
            
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