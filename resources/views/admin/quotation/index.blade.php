@extends('admin.layouts.app')

@section('browsertitle', 'Procurement | R.F.Q Request ')

@section('title',"R.F.Q ")

@section('breadcrumb1', 'R.F.Q')

@section('breadcrumb2', 'Show')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{--<div class="col-md-10 mx-auto">--}}
                <div class="col-md-12 mx-auto">
                
                <div class="row">

                    

                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header ">
                                <div class="pull-left">
                                    <h2 class="card-title"> Over Due </h2>
                                </div>
                                
                                <div class="pull-right">
                                    <h5></h5>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                        
                                                        
                                                        {{-- <form name="add_name" id="add_name">  --}}
                                                        <form method="POST" id="add_name" name="add_name">
                                                                @csrf 
                                            
                                                        <span id="result">
                                                            
                                                        </span>
                                                        
                                                        <div class="table-responsive">  
                                                            <table class="table table-bordered table-striped" id="dynamic_field"> 
                                                                <thead>
                                                                    <tr style="font-weight:bold">
                                                                        <th>#</th>
                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th>Action</th>
                                                               
                                                                    </tr>
                                                                </thead> 
                                                                <tbody>
                                                                       
                                                                </tbody>
                                                                <tfoot>
                                                                    @csrf
                                                                </tfoot>
                                                                 
                                                            </table>  
                                                              
                                                        </div>
                                                        
                                                </div> 
                                                <div class="col-md-12">
                                                        <div>
                                                            <input type="hidden" value="" name="rfq_id">
                                                        </div>
                                                        <button type="submit" name="save" id="save" class="btn btn-info btn-block">Submit</button>
                                                    </div>
                                            </form>  
                                        </div>
                                    </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->



                </div>




            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('chartsscripts')

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqueryUI/jquery-ui.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            var count = 1;

            //Generate start of the form....
            dynamic_field(count);

            function dynamic_field(number)
            {
                var html = '<tr>';
                html += '<td></td>';
                html += '<td><input tpe="text" name="first_name[]" class="form-control" /></td>';
                html += '<td><input tpe="text" name="last_name[]" class="form-control" /></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger">Remove</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }


            }

            $('#add').click(function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '#remove', function(){
                count--;
                dynamic_field(count);
            });

            $('#dynamic_form').on('submit', function(event){
                event.preventDefault();

                $.ajax({
                    url: '{{ route("saveData") }}',
                    method: 'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success: function(data){
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0;count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p';
                            }

                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div');
                        }
                        else
                        {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false)
                    }

                })
            });
        });
    </script>

 
@endsection