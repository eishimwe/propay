@extends('master')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">People</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">People</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="button-group">
                            <a href="{{ url('add_person_form') }}" class="btn waves-effect waves-light btn-primary">Add New Person</a>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="people" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Birth Date</th>
                                    <th>ID Number</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Language</th>
                                    <th>Actions</th>


                                </tr>
                                </thead>

                                <tbody>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="exampleMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '#', 'method' => 'POST','id'=>"budgetMessage" ]) !!}

                        <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" readonly></textarea>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection

@section('footer')

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script>


        $(document).ready(function(){

            if ( $.fn.dataTable.isDataTable( '#people' ) ) {
                oTablePeople.destroy();
            }

            oTablePeople  = $('#people').DataTable({
                "pageLength": 5,
                "bLengthChange": false,
                "order" :[[0,"desc"]],
                "ajax": "{!! url('/people_list')!!}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'surname',  name: 'surname'},
                    {data: 'birth_date',  name: 'birth_date'},
                    {data: 'id_number',  name: 'id_number'},
                    {data: 'mobile_number',  name: 'mobile_number'},
                    {data: 'email',  name: 'email'},
                    {data: 'language',  name: 'language'},
                    {data: 'actions',  name: 'actions'}

                ],

                "aoColumnDefs": [
                    { "bSearchable": false, "aTargets": [ 1] },
                    { "bSortable": false, "aTargets": [ 1 ] }
                ]

            });


        })

        function launchModalMessage(message){


            $('#budgetMessage #message').val(message);

        }





    </script>

@endsection
