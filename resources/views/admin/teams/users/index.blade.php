@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Teams Users')

@section('title','Team Users')

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
<div class="content">
    <div class="container-fluid">
      <div class="row">

            <div class="col-md-3 mx-auto pt-5">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2 class="fa fa-key" style="font-weight: bold; font-size:150%;">
                                                
                                        </h2>
                                    </div>
                                <div class="pull-right">
                                    {{-- <a class="btn btn-danger" href="{{ route('teams.index') }}"> Back</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                            @include('admin.layouts.includes.partials.errors')
                    </div> --}}
                    <div class="card-body">

                            <li class="list-group-item">
                                <a href="">Dashboard</a>  
                                </li>
                            <li class="list-group-item">
                               <a href="">Users</a>  
                            </li>

                            @permission('view team dashboard', $team->id )
                            <li class="list-group-item">
                                <a href="">Subscription</a> 
                            </li>
                            @endpermission
                        
                    </div>
                </div>
            <!-- /.card -->

                <div class="card">
                        
                        <div class="card-body">

                            <li class="list-group-item">
                                <a href="">Delete User</a>  
                            </li>

                        </div>
                </div>
                <!-- /.card -->
                    
            </div>
            <!-- First column -->

        <div class="col-md-9 mx-auto pt-5">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>
                                            Dashboard
                                        </h2>
                                    </div>
                                <div class="pull-right">
                                    <a class="btn btn-danger" href="{{ route('teams.index') }}"> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                            @include('admin.layouts.includes.partials.errors')
                    </div> --}}
                    <div class="card-body table-responsive">
                            
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team->users as $user)
                                    <tr>
                                        <td>{{ ucwords($user->name) }}</td>
                                        <td>
                                            @if($team->ownedBy($user))
                                                <span class="badge badge-primary badge-pill">Admin</span>
                                            @else
                                                <span class="badge badge-secondary badge-pill">Member</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->pivot->created_at->toFormattedDateString() }}
                                        </td>
                                        <td>
                                            menu
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            <!-- /.card -->

                <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            <h2 class="fa fa-user" style="font-weight: bold; font-size:150%;"> Add User</h2>
                                        </div>
                                    <div class="pull-right">
                                        {{-- <a class="btn btn-danger" href="{{ route('teams.index') }}"> Back</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                             @include('admin.layouts.includes.partials.errors')
                        </div> --}}
                        <div class="card-body table-responsive">

                            <form action="{{ route('admin.teams.users.store', $team) }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" 
                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                                           name="email" value="{{ old('email')}}">
                                    @if($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('email') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
        
                            </div>
                        <!-- /.card -->
                </div>
                    <div class="modal-footer">
                    
                        <button type="submit" class="btn btn-danger btn-block" 
                            style=" font-size:24px;"
                        >Add User</button>
                    
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
    

  })
</script>
      
@endsection