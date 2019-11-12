@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Procurement Categories ')

@section('title','Edit')

@section('breadcrumb1', 'Procurement Category')

@section('breadcrumb2', 'Edit')

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
                                                <h2 class="fa fa-key" style="font-weight: bold; font-size:150%;"> {{ ucwords($pcategory->name) }} </h2>
                                                </div>
                                            <div class="pull-right">
                                                <a class="btn btn-danger" href="{{ route('procategories.index') }}"> Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="card-body">

                                <form action="{{ route('procategories.update', $pcategory->id ) }}" method="POST">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="pt-3">
                                        <h2>Basic Information</h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name (Human Readable)</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                    value="{{ $pcategory->name }}" id="name" name="name">
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
                                    <input type="text" class="form-control {{ $errors->has('description')? 'is-invalid': ''}}" 
                                        name="description" value="{{ $pcategory->description }}" id="description">
                                    
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
                                <button type="submit" class="btn btn-danger btn-block">Update Procurement Category</button>
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