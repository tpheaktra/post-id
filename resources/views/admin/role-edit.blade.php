@section('title','Roles')
@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <br>
                <div class="col-sm-12 text-center">
                    <h4> កែប្រែតួនាទី</h4>
                </div>
                <div class="user-mangement">

                    <form method="POST" action="{{route('role.update',Crypt::encrypt($role->id))}}" style="padding: 15px;">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>	ឈ្មោះ​សំរាប់​ប្រព័ន្ធ <span class="text-danger">*</span></label>
                                {!! Form::text('name',$role->name,['class'=>'form-control','placeholder'=>'ឈ្មោះ​សំរាប់​ប្រព័ន្ធ','readonly'=>'readonly'])!!}
                            </div>
                            <div class="col-sm-6 form-group">
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
                                                            <li class="active"><a href="#home" data-toggle="tab">អ្នកប្រើប្រាស់នឹងតួនាទី</a></li>
                                                            <li><a href="#general" data-toggle="tab">ការធ្វើអត្តសញ្ញាណកម្ម</a></li>
                                                            <li><a href="#our-team" data-toggle="tab">HIQA</a></li>
                                                            <li><a href="#post" data-toggle="tab">របាយការណ៍</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9 ">
                                                    <div class="tab-content contact-tab-border">

                                                        <div class="tab-pane active" id="home" role="tabpanel">
                                                            @foreach($permission_sub as $sub)
                                                                @if($sub->group_id==1)
                                                                    <label class="main-page"> តួនាទី <input type="checkbox" id="role_1" class="hidden"/> <span data-hint="ចុច" class="btn btn-xs btn-info hint--left hint--info">ជ្រើសទាំងអស់</span></label>
                                                                    <script>
                                                                        $("#role_1").click(function () {
                                                                            $('.role_1 input:checkbox').not(this).prop('checked', this.checked);
                                                                        });
                                                                    </script>
                                                                @elseif($sub->group_id==2)
                                                                    <label class="main-page"> អ្នកប្រើប្រាស់​ <input type="checkbox" id="role_2" class="hidden"/> <span data-hint="ចុច" class="btn btn-xs btn-info hint--left hint--info">ជ្រើសទាំងអស់</span> </label>
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
                                                                                @if($sub->group_id==1 || $sub->group_id==2)
                                                                                    @if($permission->group_id==$sub->group_id)
                                                                                        <td class="role_{{$permission->group_id}}">
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
                                                                @if($sub->group_id==3)
                                                                    <label class="main-page"> អត្តសញ្ញាណកម្ម <input type="checkbox" id="role_3" class="hidden"/> <span data-hint="ចុច" class="btn btn-xs btn-info hint--left hint--info">ជ្រើសទាំងអស់</span></label>
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
                                                                                @if($sub->group_id==3)
                                                                                    @if($permission->group_id==$sub->group_id)
                                                                                        <td class="role_{{$permission->group_id}}">
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
                                                                @if($sub->group_id==4)
                                                                    <label class="main-page"> ការធ្វើអត្តសញ្ញាណកម្ម <input type="checkbox" id="role_4" class="hidden"/> <a>Check all</a></label>
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
                                                                                @if($sub->group_id==4)
                                                                                    @if($permission->group_id==$sub->group_id)
                                                                                        <td class="role_{{$permission->group_id}}">
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
                                                                @if($sub->group_id==5)
                                                                    <label class="main-page"> របាយការណ៍ <input type="checkbox" id="role_5" class="hidden"/> <span data-hint="ចុច" class="btn btn-xs btn-info hint--left hint--info">ជ្រើសទាំងអស់</span></label>
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
                                                                                @if($sub->group_id==5)
                                                                                    @if($permission->group_id==$sub->group_id)
                                                                                        <td class="role_{{$permission->group_id}}">
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
                                    <i class="fa fa-edit"></i>  ធ្វើបច្ចុប្បន្នភាព
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
        .nav > li > a:hover{border: 0px;border-radius: 0;background: linear-gradient(to bottom, rgba(249,249,249,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%) !important;}
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
