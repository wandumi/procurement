@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Create ')

@section('title','R.F.Q  ')

@section('breadcrumb1', 'Create')

@section('breadcrumb2', 'View')


@section('content')
    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card ">


                        <div class="row">

                            <div class="col-md-6 ">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="col-md">
                                            <div class="pull-left">
                                                <h2 class="card-title">
                                                    <span>&nbsp;</span> Request Type Form
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="pull-right">
                                                <!-- Button trigger modal -->
                                                <a href="{{ route('rfqrequest.index') }}" class="btn btn-danger">
                                                    Back <i><span class="fa fa-user"></span></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <form action="{{ route('rfqrequest.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="request_type">Request Type</label>

                                                        <select name="requesttype" id="" class="form-control {{ $errors->has('requesttype') ? 'is-invalid' : '' }}">
                                                            <option value="" disabled selected>Please select Request Type</option>
                                                            @foreach($requesttypes as $requesttype)

                                                                <option value="{{ $requesttype->name }}" {{ old('requesttype') == $requesttype->name ? 'selected' : ''}}>{{ $requesttype->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="procurement_category">Procurement Category</label>

                                                        <select name="pcategory" id="" class="form-control {{ $errors->has('pcategory') ? 'is-invalid' : '' }}">
                                                            <option value="" disabled selected>Please select Procurement Category</option>
                                                            @foreach($procategories as $pcategory)
                                                                <option value="{{ $pcategory->name }}" {{ old('pcategory') == $pcategory->name ? 'selected' : ''}}>{{ $pcategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="supplier_type">Supplier Type</label>

                                                        <select name="suppliertype" id="" class="form-control {{ $errors->has('suppliertype') ? 'is-invalid' : '' }}">
                                                            <option value="" disabled selected>Please select Supplier Type</option>
                                                            @foreach($suppliertypes as $suppliertype)
                                                                <option value="{{ $suppliertype->name }}" {{ old('suppliertype') == $suppliertype->name ? 'selected' : ''}}>{{ $suppliertype->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="open_date">Open Date & Time</label>
                                                        <input type="date" class="form-control {{ $errors->has('open_date') ? 'is-invalid' : '' }}"
                                                               name="open_date" value="{{ old('open_date') }}">
                                                        @if($errors->has('open_date'))
                                                            <span class="invalid-feedback">
                                                                      <strong>
                                                                            {{ $errors->first('open_date') }}
                                                                      </strong>
                                                                  </span>
                                                        @endif
                                                    </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="estimated_amount">Estimated Amount</label>
                                                    <input type="text" class="form-control {{ $errors->has('estimated_amount') ? 'is-invalid' : '' }}"
                                                           name="estimated_amount" value="{{ old('estimated_amount') }}">
                                                    @if($errors->has('estimated_amount'))
                                                        <span class="invalid-feedback">
                                                                          <strong>
                                                                                {{ $errors->first('estimated_amount') }}
                                                                          </strong>
                                                                      </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="available_budget">Available Budget</label>
                                                    <input type="text" class="form-control {{ $errors->has('available_budget') ? 'is-invalid' : '' }}"
                                                           name="available_budget" value="{{ old('available_budget') }}">
                                                    @if($errors->has('available_budget'))
                                                        <span class="invalid-feedback">
                                                                      <strong>
                                                                            {{ $errors->first('available_budget') }}
                                                                      </strong>
                                                                  </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="account_code">Account Code</label>
                                                    <input type="text" class="form-control {{ $errors->has('account_code') ? 'is-invalid' : '' }}"
                                                           name="account_code" value="{{ old('account_code') }}">
                                                    @if($errors->has('account_code'))
                                                        <span class="invalid-feedback">
                                                                          <strong>
                                                                                {{ $errors->first('account_code') }}
                                                                          </strong>
                                                                      </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="closing_date">Closing Date & Time</label>
                                                    <input type="date" class="form-control
                                                                {{ $errors->has('closing_date') ? 'is-invalid' : '' }}"
                                                           name="closing_date" value="{{ old('closing_date') }}">
                                                    @if($errors->has('closing_date'))
                                                        <span class="invalid-feedback">
                                                                          <strong>
                                                                                {{ $errors->first('closing_date') }}
                                                                          </strong>
                                                                      </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea name="message" id="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" >
                                                        {{ old('message') }}
                                                    </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="uploadfile">Upload Documents</label>

                                                <input type="file" class="form-control {{ $errors->has('uploadfile') ? 'is-invalid' : '' }}"
                                                       id="uploadfile" name="uploadfile" value="{{ old('uploadfile') }}">

                                                @if($errors->has('uploadfile'))
                                                    <span class="invalid-feedback">
                                                                          <strong>
                                                                                {{ $errors->first('uploadfile') }}
                                                                          </strong>
                                                                      </span>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkbox">Status</label>

                                                <div class="checkbox">
                                                    <input type="radio" class="{{ $errors->has('publish') ? 'is-invalid' : '' }}"
                                                           id="publish" name="publish" value="{{ old('publish') }}"> Publish
                                                </div>
                                                <div class="checkbox">
                                                    <input type="radio" class="{{ $errors->has('publish') ? 'is-invalid' : '' }}"
                                                           id="publish" name="publish" value="{{ old('publish') }}"> Draft
                                                </div>
                                                <div class="checkbox">
                                                    <input type="radio" class="{{ $errors->has('publish') ? 'is-invalid' : '' }}"
                                                           id="publish" name="publish" value="{{ old('publish') }}"> Pending
                                                </div>

                                                @if($errors->has('status'))
                                                    <span class="invalid-feedback">
                                                              <strong>
                                                                    {{ $errors->first('status') }}
                                                              </strong>
                                                          </span>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="col-md-12 pt-5">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button class="form-control">Add Fields</button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="form-control">Preview</button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="form-control">Edit</button>

                                                </div>
                                                <div class="col-md-3">
                                                    <button class="form-control" name="submit">Save</button>
                                                </div>

                                            </div>
                                        </div>


                                        </form>


                                    </div>




                                </div>
                                <!-- /.card -->

                            </div>

                            <div class="col-md-6">

                                <div class="card card-danger">


                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Initiator</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6>CT20245A</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6>Ref.No::RFQ0025</h6>
                                                    </div>
                                                    <!--First rolw -->

                                                    <div class="col-md-4">
                                                        <h6>Status</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6>DRAFT</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6>Request Approval</h6>
                                                    </div>

                                                    <!-- Second Row -->

                                                    <div class="col-md-4">
                                                        <h6>Note / Motivation</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                                <textarea name="comment" id="comment" class="form-control">
                                                                    Comment goes here...
                                                                </textarea>
                                                    </div>

                                                    <!-- Third Row -->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <button class="form-control btn-danger">Send</button>
                                            </div>
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col-md-8">REQUEST / BID BUILDER</div>
                                            <div class="col-md-4">Ref, No RFQ0025</div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-md-12">
                                                <p>FORM BUILDER</p>
                                            </div>

                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-md-3">
                                                <button>Submit</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Deviation</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Validate</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button>Release</button>
                                            </div>
                                        </div>

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
@section('chartsscripts')


    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

    <script>
        $(function () {
            // Summernote
            $('#content').summernote()
        })
    </script>
@endsection

