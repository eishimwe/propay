@extends('master')

@section('content')


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Person Edit Form</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">People</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">

                        {!! Form::open(['url' => 'people', 'method' => 'POST', 'class' => 'form-horizontal', 'id'=>"editPersonForm" ]) !!}

                        {{ method_field('PUT') }}

                        {!! Form::hidden('id',$person->id) !!}



                        <div class="form-body">

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('name')) has-danger @endif">
                                        <label class="control-label">Name</label>
                                        {!! Form::text('name',$person->name,['class' => 'form-control','id' => 'name']) !!}
                                        @if($errors->has('name')) <small class="form-control-feedback"> {{ $errors->first('name') }} </small> @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('surname')) has-danger @endif">
                                        <label class="control-label">Surname</label>
                                        {!! Form::text('surname',$person->surname,['class' => 'form-control','id' => 'surname']) !!}
                                        @if($errors->has('surname')) <small class="form-control-feedback"> {{ $errors->first('surname') }} </small> @endif
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('id_number')) has-danger @endif">
                                        <label class="control-label">ID Number</label>
                                        {!! Form::text('id_number',$person->id_number,['class' => 'form-control','id' => 'id_number']) !!}
                                        @if($errors->has('id_number')) <small class="form-control-feedback"> {{ $errors->first('id_number') }} </small> @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('mobile_number')) has-danger @endif">
                                        <label class="control-label">Mobile Number</label>
                                        {!! Form::text('mobile_number',$person->mobile_number,['class' => 'form-control','id' => 'mobile_number']) !!}
                                        @if($errors->has('mobile_number')) <small class="form-control-feedback"> {{ $errors->first('mobile_number') }} </small> @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('email')) has-danger @endif">
                                        <label class="control-label">Email Address</label>
                                        {!! Form::text('email',$person->email,['class' => 'form-control','id' => 'email']) !!}
                                        @if($errors->has('email')) <small class="form-control-feedback"> {{ $errors->first('email') }} </small> @endif
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group @if($errors->has('birth_date')) has-danger @endif">
                                        <label class="control-label">Birth Date</label>
                                        {!! Form::text('birth_date',$person->birth_date,['class' => 'form-control mydatepicker','id' => 'birth_date','placeholder' => 'mm/dd/yyyy']) !!}
                                        @if($errors->has('birth_date')) <small class="form-control-feedback"> {{ $errors->first('birth_date') }} </small> @endif

                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('language_id')) has-danger @endif">
                                        <label class="control-label">Language</label>
                                        {!! Form::select('language_id',$languages,$person->language_id,['class' => 'form-control custom-select' ,'id' => 'language_id']) !!}
                                        @if($errors->has('language_id')) <small class="form-control-feedback"> {{ $errors->first('language_id') }} </small> @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group @if($errors->has('interests')) has-danger @endif">
                                        <label class="control-label">Interests</label>
                                        {!! Form::select('interests[]',$interests,$person->interests,['class' => 'form-control select2 select2-multiple' ,'id' => 'interests','multiple' => 'multiple']) !!}
                                        @if($errors->has('interests')) <small class="form-control-feedback"> {{ $errors->first('interests') }} </small> @endif
                                    </div>


                                </div>

                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('footer')

    <script>


        $(document).ready(function(){

            // Date Picker
            jQuery('.mydatepicker, #datepicker').datepicker();

            // Select 2
            $(".select2").select2();


        })


    </script>



@endsection

