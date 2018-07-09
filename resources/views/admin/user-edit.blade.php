@section('title','Users | Edit')
@extends('layouts.admin')

@section('content')
        <section class="content-header">
          <ol class="breadcrumb pull-left">
            <li><a href="#"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
            <li class="active"> @lang('users.users')</li>
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        {!! Form::model($user, array('route' => array('user.update', $user->id))) !!}
                            
                                <div class="row">     

                                    <div class="col-md-6 col-xs-12 ">
                                        <label class=" control-label">First Name <span class="color-red">*</span></label>  
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            {{ Form::text('first_name',null,['class'=>'form-control','placeholder'=>'First Name']) }}
                                        </div>
                                    </div>
                                                
                                                      
                                    <div class="col-md-6 col-xs-12 ">
                                        <label class="control-label" >Last Name <span class="color-red">*</span></label> 
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            {{ Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Last Name']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 ">
                                        <label class="control-label" >E-Mail <span class="color-red">*</span></label> 
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            {{ Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'E-Mail Address','disabled'=>'true']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 ">
                                        <label class="control-label" >Phone</label> 
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                            {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'(845)555-1212']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 ">
                                        <label class="control-label" >Password <span class="color-red">*</span></label> 
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 ">
                                        <label class="control-label" >Confirm Password <span class="color-red">*</span></label> 
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            {{ Form::password('confirm-password',['class'=>'form-control','placeholder'=>'confirm password']) }}
                                        </div>
                                    </div>


         
                                    <div class="col-md-12 col-xs-12 ">
                                        <label class="control-label" >Address</label> 
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                            {{ Form::textarea('address',null,['class'=>'form-control myarea','placeholder'=>'Address']) }}
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Users Privileges</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-sm-6 col-md-3 col-xs-12">
                                                    {{ Form::checkbox('roles[]',$role->id) }}  {{$role->display_name}} <br>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right" id="submit">
                                        <i class="glyphicon glyphicon-edit"></i> Updated
                                    </button>
                                </div>
                        {!! Form::close() !!}

                    </div>
                </div><!-- box -->
            </div>
        </div>
    </section>
@endsection
