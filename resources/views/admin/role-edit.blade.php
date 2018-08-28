@section('title','Roles')
@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <div class="user-mangement">

                    <form method="POST" action="{{route('role.update',Crypt::encrypt($role->id))}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label>	ឈ្មោះ​សំរាប់​ប្រព័ន្ធ <span class="text-danger">*</span></label>
                                {!! Form::text('name',$role->name,['class'=>'form-control','placeholder'=>'ឈ្មោះ​សំរាប់​ប្រព័ន្ធ'])!!}
                            </div>
                            <div class="col-sm-6">
                                <label>បង្ហាញតូនាទី <span class="text-danger">*</span></label>
                                {!! Form::text('display_name',$role->display_name,['class'=>'form-control','placeholder'=>'បង្ហាញតូនាទី'])!!}
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"><h4 class="box-title">កំណត់សិទ្ធិអ្នកប្រើប្រាស់ <span class="text-danger">*</span></h4></legend>
                                    <div class="box-body">
                                        <div class="row">
                                            <!-- tabs -->
                                            <div class="tabbable tabs-left">

                                                <div class="col-sm-3">
                                                    <div class=" tab-border">
                                                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                                                            <li class="active"><a href="#home" data-toggle="tab">User and Role</a></li>
                                                            <li><a href="#general" data-toggle="tab">Patient</a></li>
                                                            <li><a href="#our-team" data-toggle="tab">HIQA</a></li>
                                                            <li><a href="#post" data-toggle="tab">Monitor</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9 ">
                                                    <div class="tab-content contact-tab-border">

                                                        <div class="tab-pane active" id="home" role="tabpanel">
                                                            @foreach($permission_sub as $sub)
                                                                @if($sub->parent_id==1)
                                                                    <label class="main-page"> Roles List <input type="checkbox" id="role_1" class="hidden"/> <a>Check all </a><span class="text-danger">*</span></label>
                                                                    <script>
                                                                        $("#role_1").click(function () {
                                                                            $('.role_1 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @elseif($sub->parent_id==2)
                                                                    <label class="main-page"> Users List <input type="checkbox" id="role_2" class="hidden"/> <a>Check all </a><span class="text-danger">*</span></label>
                                                                    <script>
                                                                        $("#role_2").click(function () {
                                                                            $('.role_2 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @endif
                                                                <div class="myborder">
                                                                    <table>
                                                                        <tr>
                                                                            @foreach($permissions as $permission)
                                                                                @if($sub->parent_id==1 || $sub->parent_id==2)
                                                                                    @if($permission->parent_id==$sub->parent_id)
                                                                                        <td class="role_{{$permission->parent_id}}">
                                                                                            {{ Form::checkbox('permission[]',$permission->id,in_array($permission->id,$role_permissions)?"checked":"") }}  {{$permission->display_name}}
                                                                                        </td>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="tab-pane" id="general" role="tabpanel">
                                                            @foreach($permission_sub as $sub)
                                                                @if($sub->parent_id==3)
                                                                    <label class="main-page"> Course List <input type="checkbox" id="role_3" class="hidden"/> <a>Check all</a></label>
                                                                    <script>
                                                                        $("#role_3").click(function () {
                                                                            $('.role_3 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @endif
                                                                <div class="myborder">
                                                                    <table>
                                                                        <tr>
                                                                            @foreach($permissions as $permission)
                                                                                @if($sub->parent_id==3)
                                                                                    @if($permission->parent_id==$sub->parent_id)
                                                                                        <td class="role_{{$permission->parent_id}}">
                                                                                            {{ Form::checkbox('permission[]',$permission->id,in_array($permission->id,$role_permissions)?"checked":"") }}  {{$permission->display_name}}
                                                                                        </td>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="tab-pane" id="our-team" role="tabpanel">
                                                            @foreach($permission_sub as $sub)
                                                                @if($sub->parent_id==4)
                                                                    <label class="main-page"> Student List <input type="checkbox" id="role_4" class="hidden"/> <a>Check all</a></label>
                                                                    <script>
                                                                        $("#role_4").click(function () {
                                                                            $('.role_4 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @endif
                                                                <div class="myborder">
                                                                    <table>
                                                                        <tr>
                                                                            @foreach($permissions as $permission)
                                                                                @if($sub->parent_id==4)
                                                                                    @if($permission->parent_id==$sub->parent_id)
                                                                                        <td class="role_{{$permission->parent_id}}">
                                                                                            {{ Form::checkbox('permission[]',$permission->id,in_array($permission->id,$role_permissions)?"checked":"") }}  {{$permission->display_name}}

                                                                                        </td>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="tab-pane" id="post" role="tabpanel">
                                                            @foreach($permission_sub as $sub)
                                                                @if($sub->parent_id==5)
                                                                    <label class="main-page"> Fees List <input type="checkbox" id="role_5" class="hidden"/> <a>Check all</a></label>
                                                                    <script>
                                                                        $("#role_5").click(function () {
                                                                            $('.role_5 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @endif
                                                                <div class="myborder">
                                                                    <table>
                                                                        <tr>
                                                                            @foreach($permissions as $permission)
                                                                                @if($sub->parent_id==5)
                                                                                    @if($permission->parent_id==$sub->parent_id)
                                                                                        <td class="role_{{$permission->parent_id}}">
                                                                                            {{ Form::checkbox('permission[]',$permission->id,in_array($permission->id,$role_permissions)?"checked":"") }}  {{$permission->display_name}}
                                                                                        </td>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /tabs -->
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-sm-12"><hr>
                                <button type="submit" class="btn btn-primary pull-right" id="submit">
                                    <i class="fa fa-floppy-o"></i> រក្សាទុក
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <style>
        .myborder{float: left;width: 100%;}
        .myborder > table{border: 1px solid #eeee;padding: 10px;float: left;width: 100%;}
        .myborder tr td{float: left;margin: 15px 0;width: 50%;}
        .myborder tr td input{margin-left: 10px;margin-right: 10px;}
        .control-label strong, .main-page{float: left;font-size: 15px;font-weight: 600 !important;margin: 10px 0;width: 100%;}
        .tab-border{border: 1px solid #dadada;min-height: 400px;padding-top: 15px;}
        .contact-tab-border{border: 1px solid #dadada;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;}
        .tabbable.tabs-left{ width: 100%; float: left;}
        .tab-content{ float: left;min-height: 400px;width: 100%;}
        .tabs-left > .nav-tabs {border-bottom: 0;}
        .tab-content .tab-pane,
        .pill-content > .pill-pane {display: none;}
        .tab-content > .active,
        .pill-content > .active {display: block;float: left;width: 100%;}
        .nav-tabs  li {float: none !important;margin-bottom: 5px;}
        .nav-tabs > li a{margin: 0px;border: 0px;}
        .nav-tabs > li.active a,
        .nav > li > a:focus,
        .nav > li > a:hover{border: 0px;border-radius: 0;background-color: #eeeeee !important;}
        .nav-tabs{ border-bottom: none !important}
        span.labels{ font-size: 16px; font-weight: 600;}
        .tabbable .nav-tabs{ background-color: #fff !important;}

        .nav-tabs > li{ float: none !important; padding: 5px !important; width: 100%;}

        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:focus,
        .nav-tabs > li.active > a:hover{
            border: none !important;
            background-color: #eee !important;
            border-radius: 0px !important;
        }
        .nav-tabs > li > a:hover{ border-color: #fff !important;}

        .mce-content-body img{
            padding: 0 20px !important;
        }
    </style>
@endsection
