@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Users ')

@section('title','User Management ')

@section('breadcrumb1', 'User Management')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            
            <div class="col-lg-12 col-md-8 mx-auto">

                    <div class="card">
                            <div class="card-header">
                                {{-- <div class="col-md">
                                    <p>wandumi</p>
                                </div> --}}
                                <div class="col-md">
                                    <div class="pull-right">
                                        <!-- Button trigger modal -->
                                        <a href="{{ route('users.create') }}" class="btn btn-danger">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                 {{-- @include('admin.layouts.includes.partials.errors') --}}
                                 @include('admin.layouts.includes.partials.success')
                            </div>
                            <div class="card-body table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">User Name</th>
                                                <th score="col">Email Address</th>
                                                <th score="col">Roles/Permissions</th>
                                                <th score="col">Status</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($users as $user )
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ($user->roles as $role)
                                                            <li class="badge badge-danger">{{ ucwords($role->name) }} </li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($user->isOnline())
                                                            <span class="text-success">Online</span>
                                                        @else
                                                            <span class="text-muted">Offline</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ date ('M j, Y', strtotime($user->created_at)) }}</td>

                                                    <td>
                                                    <a href="{{ route('users.show', $user->id) }}" class="fa fa-eye btn btn-sm btn-success">
                                                    </a> |
                                                    <a href="{{ route('users.edit', $user->id) }}" class="fa fa-edit btn btn-sm btn-primary">
                                                    </a> | 

                                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id ) }}"
                                                                method="POST" style="display:none" >
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a href="" onclick="
                                                            if(confirm('Are you sure you want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $user->id }}').submit();
                                                            }else{
                                                                event.preventDefault();
                                                            }">

                                                            <span class="fa fa-trash btn btn-sm btn-danger"></span>
                                                        </a>

                                                    </td>

                                                </tr>
                                                @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">User Name</th>
                                                <th score="col">Email Address</th>
                                                <th score="col">Roles/Permissions</th>
                                                <th score="col">Status</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                            </div>
                            <div class="card-footer">
                                {{-- {{ $users->links() }} --}}
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



