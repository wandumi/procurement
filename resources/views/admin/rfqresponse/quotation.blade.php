@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | R.F.Q User Quotation')

@section('title','R.F.Q Quote')

@section('breadcrumb1', 'Quote')

@section('breadcrumb2', 'View')


@section('content')

    <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                <div class="callout callout-info">
                    <h5><i class="fa fa-info"></i> Note       </h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>
    
    
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    
    
                    <!-- Table row -->
                    <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Item Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($quotations as $quote)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $quote->product_name }}</td>
                                    <td>{{ $quote->description }}</td>
                                    <td>{{ $quote->quantity }}</td>
                                    <td>{{ $quote->item_cost}}</td>
                                    <td>{{ $quote->total_cost }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
    
                    <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                       
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Amount Due 2/22/2014</p>
    
                        <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>R250.30</td>
                            </tr>
                            <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>R250.30</td>
                            </tr>
                            <tr>
                            <th>Tax (15%)</th>
                            <td>R10.34</td>
                            </tr>
                            
                            <tr>
                            <th>Total:</th>
                            <td>R265.24</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
    
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                    <div class="col-12">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                        </button>
                    </div>
                    </div>
                </div>
                <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection