@section('title','Users | Created Users')
@extends('layouts.app')

@section('content')
<style>
    .select2-container--default.select2-container--focus .select2-selection--multiple{
        border: 1px solid #dadada !important;
    }
</style>
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12"><br>
                <div class="col-sm-12 text-center">
                    <h4> បង្កើតអ្នក​ប្រើប្រាស់​ថ្មី</h4>
                </div>
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
                                                    <td width="50%">មន្ទីពេទ្យ <span class="text-danger">*</span></td>
                                                    <td width="50%">
                                                        <div class="input-group" style="width: 100%">
                                                            <select multiple class="form-control" id="hospital" data-placeholder="Please select hospital"  width="100%">
                                                                @foreach($hospital as $key =>$hop)
                                                                <option value="{{$hop->od_code}}">មន្ទីពេទ្យ - {{$hop->name_kh}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <table class="user-table">
                                                <tr>
                                                    <td width="50%">កាលបរិច្ឆេទបង្កើត <span class="text-danger">*</span></td>
                                                    <td width="50%">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  id="date_join" name="date_join"/>
                                                                    <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
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
                                            @if($role->name != 'supperadmin' || auth::user()->username == 'supperadmin')
                                            <div class="form-group col-sm-6 col-md-3 col-xs-12">
                                                {{ Form::checkbox('roles[]',$role->id) }}  {{$role->display_name}} <br>
                                            </div>
                                            @endif
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


    <script>
        $('#date_join').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true
        });
        $("#date_join").datepicker().datepicker("setDate", new Date());
        $('#hospital').select2({
           val:''
        });
    </script>
@endsection
