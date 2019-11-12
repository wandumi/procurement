@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Teams ')

@section('title','Teams ')

@section('breadcrumb1', 'Teams')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-8 col-md-8 mx-auto pt-5">

                    <div class="card">
                            <div class="card-header">
                                <div class="col-md">
                                    <div class="pull-left">
                                        <h2 class="fa fa-key" style="font-weight: bold; font-size: 24px;"> Teams</h2>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="pull-right">
                                        <!-- Button trigger modal -->
                                    <a href="{{ route('teams.create') }}" class="btn btn-danger">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                 @include('admin.layouts.includes.partials.success')
                            </div>
                            <div class="card-body">

                                @if($teams->count())
                                    @foreach($teams as $team)
                                        <li class="list-group-item d-flex justify-content-between
                                        align-items-center">
                                            <a href="{{ route('teams.show', $team) }}">
                                                {{ $team->name }}
                                            </a>

                                            @if($team->ownedByCurrentUser(  ) )
                                               <span class="badge badge-primary badge-pill">
                                                    admin
                                               </span>
                                            @endif

                                            <form id="delete-form-{{ $team->id }}" action="{{ route('teams.destroy', $team->id ) }}"
                                                    method="POST" style="display:none" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                    
                                            <a href="" onclick="
                                                if(confirm('Are you sure you want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $team->id }}').submit();
                                                }else{
                                                    event.preventDefault();
                                                }">
                    
                                                <span class="fa fa-trash btn btn-sm btn-danger"></span>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <p class="mb-0">
                                        You're not part of any teams
                                    </p>
                                @endif
                                    

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


{{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th score="col">Team Name</th>
                <th score="col">Date</th>
                <th score="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($teams->count())
                @foreach ($teams as $team )
                <tr>

                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                       <a href="{{ route('teams.show', $team ) }}"> {{ $team->name }} </a>
                    </td>
                    
                    <td>{{ date ('M j, Y', strtotime($team->created_at)) }}</td>

                    <td>
                    <a href="" class="fa fa-edit btn btn-sm btn-primary">
                    </a>

                        <form id="delete-form-{{ $team->id }}" action="{{ route('teams.destroy', $team->id ) }}"
                                method="POST" style="display:none" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>

                        <a href="" onclick="
                            if(confirm('Are you sure you want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $team->id }}').submit();
                            }else{
                                event.preventDefault();
                            }">

                            <span class="fa fa-trash btn btn-sm btn-danger"></span>
                        </a>

                    </td>

                </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td class="mb-2" style="text-align:center;">There are no teams to show</td>
                </tr>
                
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th score="col">Team Name</th>
                <th score="col">Date</th>
                <th score="col">Action</th>
            </tr>
        </tfoot>
    </table> --}}

