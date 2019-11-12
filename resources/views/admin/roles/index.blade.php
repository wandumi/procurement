@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Roles ')

@section('title','Roles')

@section('breadcrumb1', 'Roles')

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
                                    <div class="pull-left">
                                       <h2 class="card-title">Roles</h2> 
                                    </div>
                                    <div class="pull-right">
                                        <!-- Button trigger modal -->
                                        <a href="{{ route('roles.create') }}" class="btn btn-danger">
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
                                                <th score="col">Role Name</th>
                                                <th score="col">Display Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Permissions</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($roles as $role )
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ ucfirst($role->name) }}</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td>{{ $role->description }}</td>
                                                    <td style="width:25%;">
                                                        @foreach ($role->permissions as $permission )
                                                            <li class="badge badge-danger">{{ ucwords($permission->name) }} </li>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ date ('M j, Y', strtotime($role->created_at)) }}</td>

                                                    <td>
                                                    <a href="{{ route('roles.show', $role->id) }}" class="fa fa-eye btn btn-sm btn-success">
                                                    </a> |
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="fa fa-edit btn btn-sm btn-primary">
                                                    </a> | 

                                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id ) }}"
                                                                method="POST" style="display:none" >
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a href="" onclick="
                                                            if(confirm('Are you sure you want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $role->id }}').submit();
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
                                                <th score="col">Role Name</th>
                                                <th score="col">Display Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Permissions</th>
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



