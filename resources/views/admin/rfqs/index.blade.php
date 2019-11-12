@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Request ')

@section('title',"R.F.Q's ")

@section('breadcrumb1', 'R.F.Q Request')

@section('breadcrumb2', 'View')


@section('content')
    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card card-danger card-outline">


                            <!-- /.row -->
                            <div class="row" >

                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="col-md">
                                                <div class="pull-left">
                                                    <h2>
                                                        <span>&nbsp;</span> Request Types
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="pull-right">
                                                    <!-- Button trigger modal -->
                                                    <a href="{{ route('rfqs.create') }}" class="btn btn-danger">
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
                                                    <th> Refference NO  </th>
                                                    <th> Request Type </th>
                                                    <th> Estimated Amount  </th>
                                                    <th> Available Budget  </th>
                                                    <th> Account Code </th>
                                                    <th> Status </th>
                                                    <th> Comment </th>
                                                    <th> Open Date  </th>
                                                    <th> Closing Date  </th>
                                                    <th> View|Edit|Delete </th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @if($rfqs->isEmpty())
                                                    <p class="alert alert-danger">There no R.F.Q's Created</p>
                                                @else
                                                    @foreach ($rfqs as $rfq )
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $rfq->reference_no }}</td>
                                                            <td>
                                                                {{-- {{ $rfq->requesttypes_id }} --}}
                                                                @foreach($requesttypes as $requesttype)
                                                        
                                                                        @if($requesttype->id === $rfq->requesttypes_id)
                                                                            {{ $requesttype->name }}
                                                                        @endif
                                                                        
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $rfq->estimated_amount }} </td>
                                                            <td>{{ $rfq->available_budget }} </td>
                                                            <td>{{ $rfq->account_code }} </td>
                                                            <td>
                                                                @foreach($rfqstatuses as $status)
                                                                    @if($status->id === $rfq->status_id)
                                                                        @if($status->name === 'Published')
                                                                            <span class="badge badge-success p-2">
                                                                                {{ $status->name }}
                                                                            </span>
                                                                        @elseif($status->name === 'Draft') 
                                                                            <span class="badge badge-warning p-2">
                                                                                {{ $status->name }}
                                                                            </span>
                                                                        @elseif($status->name === 'Pending') 
                                                                            <span class="badge badge-info p-2">
                                                                                {{ $status->name }}
                                                                            </span>
                                                                        @endif
                                                                    @endif

                                                                @endforeach
                                                                
                                                            </td>
                                                            <td width="20%" >
                                                                <span style="text-align:center;">
                                                                    @if($rfq->comments->isNotEmpty())
                                                                      {{ $rfq->comments->last()->body }} 
                                                                    @else
                                                                      <span>Waiting for reply ...</span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>{{ date ('M j, Y', strtotime($rfq->open_date_time ) ) }}</td>
                                                            <td>{{ date ('M j, Y', strtotime($rfq->closing_date_time )) }}</td>

                                                            {{-- <td>{{ date ('M j, Y H:i a', strtotime($rfq->closing_date_time )) }}</td> --}}

                                                            <td>
                                                                <a href="{{ route('rfqs.show', $rfq->id) }}" class="fa fa-eye btn btn-sm btn-success">
                                                                </a>
                                                                <a href="{{ route('rfqs.edit', $rfq->id) }}" class="fa fa-edit btn btn-sm btn-info">
                                                                </a>

                                                                <form id="delete-form-{{ $rfq->id }}" action="{{ route('rfqs.destroy', $rfq->id ) }}"
                                                                    method="POST" style="display:none" >
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>

                                                                <a href="" onclick="
                                                                        if(confirm('Are you sure you want to delete this?')){
                                                                        event.preventDefault();
                                                                        document.getElementById('delete-form-{{ $rfq->id }}').submit();
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
                                                    <th> Refference NO  </th>
                                                    <th> Request Type </th>
                                                    <th> Estimated Amount  </th>
                                                    <th> Available Budget  </th>
                                                    <th> Account Code </th>
                                                    <th> Status </th>
                                                    <th> Comment </th>
                                                    <th> Open Date  </th>
                                                    <th> Closing Date  </th>
                                                    <th> View|Edit|Delete </th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>




                                    </div>
                                    <!-- /.card -->

                                </div>

                            </div>





                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- END CUSTOM TABS -->
            <!-- START PROGRESS BARS -->

        </div>

    </div>
    <!-- /.content -->

@endsection
