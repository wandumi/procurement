@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Request Type ')

@section('title','Create New')

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
                                        <h2 class="fa fa-key" style="font-weight: bold; font-size: 24px;">Request Type</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-danger" href="{{ route('requesttypes.index') }}">
                                            <span class=""> Back</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body table-responsive">

                            <form action="{{ route('requesttypes.store') }}" method="POST">

                                @csrf
        
                                <div class="form-group">
                                    <label for="name">Name</label>
                                <input type="text" id="name" 
                                       class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                       name="name" value="{{ old('name')}}">
                                       @if($errors->has('name'))
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </span>
                                       @endif
                                </div>
        
                                <div class="form-group">
                                    <label for="description">Description</label>
                                <input type="text" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
                                    name="description" value="{{ old('description')}}">
                                    @if($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('description') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
        
                            </div>
                              
                           

                        </div>
                    
                        <!-- /.card -->


                        <div class="modal-footer">
                                            
                                <button type="submit" class="btn btn-danger btn-block" 
                                {{--style=" font-size:24px;"--}}
                                >Create Request Type</button>
                            
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
                </div>


                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- /.content -->



@endsection

