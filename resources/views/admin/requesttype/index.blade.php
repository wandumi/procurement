@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Request Types')

@section('title','View ')

@section('breadcrumb1', 'Request Types')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12 mx-auto">

                    <div class="card">
                            <div class="card-header">
                                <div class="col-md">
                                    <div class="pull-left">
                                        <h2 class="fa fa-key" style="font-weight: bold; font-size: 24px;"><span>&nbsp;</span> Request Types</h2>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="pull-right">
                                        <!-- Button trigger modal -->
                                        <a href="{{ route('requesttypes.create') }}" class="btn btn-danger">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                 @include('admin.layouts.includes.partials.success')
                            </div>
                            <div class="card-body table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">Request Type Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($requesttypes->isEmpty())
                                                <p class="alert alert-danger">There are no REQUEST TYPES created</p>
                                            @else
                                                @foreach ($requesttypes as $requesttype )
                                                    <tr>

                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td >{{ $requesttype->name }}</td>
                                                        <td >{{ $requesttype->description }}</td>
                                                        <td >{{ date ('M j, Y', strtotime($requesttype->created_at)) }}</td>

                                                        <td>
                                                        <a href="{{ route('requesttypes.edit', $requesttype->id) }}" class="fa fa-edit btn btn-sm btn-info">
                                                        </a>

                                                            <form id="delete-form-{{ $requesttype->id }}" action="{{ route('requesttypes.destroy', $requesttype->id ) }}"
                                                                    method="POST" style="display:none" >
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            </form>

                                                            <a href="" onclick="
                                                                if(confirm('Are you sure you want to delete this?')){
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $requesttype->id }}').submit();
                                                                }else{
                                                                    event.preventDefault();
                                                                }">

                                                                <span class="fa fa-trash btn btn-sm btn-danger"></span>
                                                            </a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">Request Type Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

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



