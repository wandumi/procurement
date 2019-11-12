@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Roles')

@section('title','Create New Role')

@section('breadcrumb1', 'Create')

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
                        <h2>Role</h2>
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
                    

                    <div class="col-md-9">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <h2 class="card-title" style="font-weight: bold; font-size:24px;">Role Information</h2>     
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                  
                                    <form action="{{ route('roles.store') }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-10 mx-auto">
                                                    
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                                           name="name" value="{{ old('name') }}" >
                                                           @if($errors->has('name'))
                                                              <span class="invalid-feedback">
                                                                  <strong>
                                                                        {{ $errors->first('name') }}
                                                                  </strong>
                                                              </span>
                                                           @endif
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="display_name">Display Name</label>
                                                        <input type="display_name" id="display_name" 
                                                               class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" 
                                                               name="display_name" value="{{ old('display_name') }}">
                                                        @if($errors->has('display_name'))
                                                            <span class="invalid-feedback">
                                                                <strong>
                                                                    {{ $errors->first('display_name') }}
                                                                </strong>
                                                            </span>
                                                        @endif
                                                    </div>
                            
                            
                                                    <div class="form-group">
                                                        <label for="description">description</label>
                                                    <input type="description" id="description" 
                                                               class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
                                                               name="description" value="{{ old('description') }}">
                            
                                                        <small id="description" class="text-muted">
                                                            Must be 6-20 characters long.
                                                        </small>
                                                        @if($errors->has('description'))
                                                            <span class="invalid-feedback">
                                                                <strong>
                                                                    {{ $errors->first('description') }}
                                                                </strong>
                                                            </span>
                                                        @endif
                                                    </div>
                            
                                                    
            
                                                    <!-- Profile Image -->
            
                                                </div>
                                                
                                            </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
        
                    <div class="col-md-3">
        
                        <!-- Roles Box -->
                        <div class="card card-danger card-outline ">
                            <div class="card-header">
                                <h2 class="card-title" style="font-weight: bold; font-size:24px;">Permissions</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    
                                    <div class="form-group mb-5 pt-2">
                                        <label>Permissions</label>
                                        <select class="select2 " multiple="permissions"  data-placeholder="Select Roles" 
                                                style="width: 100%; color:red;"
                                                name="permissions[]">
                                            @foreach($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                
                                    
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
        
                        
        
                    </div>
                    <!-- /.col -->
                    
            </div>
            
            <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-danger btn-block"
                          style="font-size:18px;"
                    >Create a Role</button>
                
                    </div>
                </form>

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