@section('title','Users | Created Users')
@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <div class="user-mangement">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['route' => 'user.store'],['enctype'=>'multipart/form-data']) !!}

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><h4 class="box-title">ព័តមានអ្នកប្រើប្រាស់ថ្មី </h4></legend>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-xs-12">
                                           <table class="user-table">
                                               <tr>
                                                   <td width="50%">ឈ្មោះ<span class="text-danger">*</span></td>
                                                   <td width="50%">
                                                       {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'ឈ្មោះ']) }}
                                                   </td>
                                               </tr>
                                           </table>
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td width="50%">ឈ្មោះប្រើប្រាស់ <span class="text-danger">*</span></td>
                                                    <td width="50%">
                                                        {{ Form::text('username',null,['class'=>'form-control','placeholder'=>'ឈ្មោះប្រើប្រាស់']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td>សារអេឡិចត្រូនិច </td>
                                                    <td>
                                                        {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'សារអេឡិចត្រូនិច']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td>លេខទូរសព្ទ</td>
                                                    <td>
                                                        {{ Form::number('phone',null,['class'=>'form-control','placeholder'=>'លេខទូរសព្ទ']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>


                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td>ពាក្យសំងាត់ <span class="text-danger">*</span></td>
                                                    <td>
                                                        {{ Form::password('password',['class'=>'form-control','placeholder'=>'ពាក្យសំងាត់']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td>បញ្ជាក់ <span class="text-danger">*</span></td>
                                                    <td>
                                                        {{ Form::password('confirm',['class'=>'form-control','placeholder'=>'បញ្ជាក់']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><h4 class="box-title">កំណត់តួនាទី <span class="text-danger">*</span></h4></legend>
                                <div class="box-body">
                                    <div class="row">
                                        @foreach($roles as $role)
                                            <div class="form-group col-sm-6 col-md-3 col-xs-12">
                                                {{ Form::checkbox('roles[]',$role->id) }}  {{$role->display_name}} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><h4 class="box-title">កំណត់​ក្រុម​​​​ <span class="text-danger">*</span></h4></legend>
                                <div class="box-body">
                                    <div class="row">
                                        @foreach($groups as $group)
                                            <div class="form-group col-sm-6 col-md-3 col-xs-12">
                                                {{ Form::checkbox('groups[]',$group->id) }}  {{$group->name}} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>


                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right" id="submit">
                                    <i class="fa fa-floppy-o"></i> រក្សាទុក
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div><!-- box -->
                </div>
            </div>
        </div>
    </section>
@endsection
