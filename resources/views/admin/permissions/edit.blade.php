@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Permissions ')

@section('title','Edit Permission')

@section('breadcrumb1', 'Edit')

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
        <div class="content">
            <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 mx-auto pt-5">

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                <h2 class="fa fa-key" style="font-weight: bold; font-size:150%;"> {{ ucwords($permissions->name) }} </h2>
                                                </div>
                                            <div class="pull-right">
                                                <a class="btn btn-danger" href="{{ route('permissions.index') }}"> Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="card-body">

                                <form action="{{ route('permissions.update', $permissions->id ) }}" method="POST">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="pt-3 pb-3">
                                        <h2>Basic Information</h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name (Human Readable)</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                    value="{{ $permissions->name }}" id="name" name="name">
                                    @if($errors->has('name'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </span>
                                       @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="disply_name">Slug (Can not be edited)</label>
                                        <input type="text" class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" name="display_name" value="{{ $permissions->display_name }}" id="display_name">
                                        @if($errors->has('display_name'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('display_name') }}
                                                </strong>
                                            </span>
                                       @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                    <input type="text" class="form-control {{ $errors->has('description')? 'is-invalid': ''}}" 
                                        name="description" value="{{ $permissions->description }}" id="description">
                                    
                                    @if($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('description') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>

                                    
                                    
                                    
                                </div>
                                <!-- /.card body -->
                                
                                
                            </div>
                            
                            <div class="mt-5" >
                                <button type="submit" class="btn btn-danger btn-block">Update Permission</button>
                            </div>

                            </form>
                            <!-- end of the form -->
                                
                        </div>
                    </div>
                <!-- /.card -->

                            
                </div>

                
                
                
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('chartsscripts')
    
    <script>
        const app = new vue({
            el = '#app',
            data: {
                
            }
        });
    </script>
      
@endsection