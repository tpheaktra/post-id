@section('title','Users')
@extends('layouts.app')

@section('content')
    <style>
        .user-profile{
            float: left;
            margin-top: 30px;
            padding: 14px;
            border: 1px solid #dadada;
            width: 100%;
        }
        .fileinput .btn{ width: 100%}
        #image_message{
            float: left;
            width: 100%;
            margin-top: 10px;
        }
        #image_message .alert.alert-success{
            padding: 10px !important;
            margin: 0px !important;
        }
        .input-hidden{
            box-shadow: none;
            width: 50%;
            border: 1px solid #fff;
        }
        .input-with{ width: 50%;}

        .nav-tabs {
            margin-bottom: 6px;
            border: 0px !important;
            background: linear-gradient(to bottom, rgba(249, 249, 249, 1) 0%, rgba(246, 246, 246, 1) 47%, rgba(237, 237, 237, 1) 100%);
        }
        .nav-tabs > li > a{
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 0px !important;
        }
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus{
            border-color: #fff !important;
        }

        .profile-user-info {
            display: table;
            width: 98%;
            width: calc(100% - 24px);
            margin: 0 auto
        }

        .profile-info-row {
            display: table-row
        }

        .profile-info-name,
        .profile-info-value {
            display: table-cell;
            border-top: 1px dotted #D5E4F1
        }

        .profile-info-name {
            text-align: right;
            padding: 6px 10px 6px 4px;
            font-weight: 400;
            color: #667E99;
            background-color: transparent;
            width: 140px;
            vertical-align: middle
        }

        .profile-info-value {
            padding: 6px 4px 6px 6px
        }

        .profile-info-value>span+span:before {
            display: inline;
            content: ",";
            margin-left: 1px;
            margin-right: 3px;
            color: #666;
            border-bottom: 1px solid #FFF
        }



        .profile-info-row:first-child .profile-info-name,
        .profile-info-row:first-child .profile-info-value {
            border-top: none
        }



        .profile-user-info-striped .profile-info-name {
            color: #336199;
            background-color: #EDF3F4;
            border-top: 1px solid #F7FBFF
        }

        .profile-user-info-striped .profile-info-value {
            border-top: 1px dotted #DCEBF7;
            padding-left: 12px
        }

        .profile-picture {
            border: 1px solid #CCC;
            background-color: #FFF;
            padding: 4px;
            display: inline-block;
            max-width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px rgba(0, 0, 0, .15)
        }



        .profile-activity img {
            border: 2px solid #C9D6E5;
            border-radius: 100%;
            max-width: 40px;
            margin-right: 10px;
            margin-left: 0;
            box-shadow: none
        }



        .user-profile .ace-thumbnails li {
            border: 1px solid #CCC;
            padding: 3px;
            margin: 6px
        }

        .btn-link:hover .ace-icon {
            text-decoration: none!important
        }


        .profile-social-links>a {
            text-decoration: none;
            margin: 0 1px
        }


        .profile-users .user img {
            padding: 2px;
            border-radius: 100%;
            border: 1px solid #AAA;
            max-width: none;
            width: 64px;
            -webkit-transition: all .1s;
            -o-transition: all .1s;
            transition: all .1s
        }
        .profile-users .user img:hover {
            -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .33);
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, .33)
        }

        .profile-users .memberdiv {
            background-color: #FFF;
            width: 100px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border: none;
            text-align: center;
            margin: 0 8px 24px
        }
        .profile-users .memberdiv .tools>a {
            margin: 0 2px
        }

        .itemdiv>.body>.name>b {
            color: #777
        }

        .itemdiv.dialogdiv>.user>img {
            border-color: #C9D6E5
        }

        .itemdiv.memberdiv>.user>img {
            border-color: #DCE3ED
        }

        .itemdiv.memberdiv>.body>.name>a {
            display: inline-block;
            max-width: 100px;
            max-height: 18px;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-all
        }

        .itemdiv.commentdiv .tools {
            right: 9px
        }

        .item-list>li {
            padding: 9px;
            background-color: #FFF;
            margin-top: -1px;
            position: relative
        }

        .item-list>li label {
            font-size: 13px
        }

        .ace-thumbnails>li,
        .ace-thumbnails>li>:first-child {
            display: block;
            position: relative
        }


        .ace-thumbnails>li {
            float: left;
            overflow: hidden;
            margin: 2px;
            border: 2px solid #333
        }

        .ace-thumbnails>li>:first-child:focus {
            outline: 0
        }

        .ace-thumbnails>li>.tools>a,
        .ace-thumbnails>li>:first-child .inner a {
            display: inline-block;
            color: #FFF;
            font-size: 18px;
            font-weight: 400;
            padding: 0 4px
        }

        .ace-thumbnails>li>.tools>a:hover,
        .ace-thumbnails>li>:first-child .inner a:hover {
            text-decoration: none;
            color: #C9E2EA
        }

        .ace-thumbnails>li .tools.tools-bottom>a,
        .ace-thumbnails>li .tools.tools-top>a {
            display: inline-block
        }

        .ace-thumbnails>li>:first-child>.text {
            right: 0;
            left: 0;
            bottom: 0;
            top: 0;
            color: #FFF;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease
        }

        .nav-tabs>li>a:active,
        .nav-tabs>li>a:focus {
            outline: 0!important
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            border-top: 2px solid #4C8FBD;
            background-color: #FFF;
        }


        .tabs-below>.nav-tabs>li>a,
        .tabs-below>.nav-tabs>li>a:focus,
        .tabs-below>.nav-tabs>li>a:hover {
            border-color: #C5D0DC
        }

        .tabs-below>.nav-tabs>li.active>a,
        .tabs-below>.nav-tabs>li.active>a:focus,
        .tabs-below>.nav-tabs>li.active>a:hover {
            border-color: transparent #C5D0DC #C5D0DC;
            border-top-width: 1px;
            border-bottom: 2px solid #4C8FBD;
            margin-top: 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15)
        }

        .tabs-left>.nav-tabs>li>a,
        .tabs-right>.nav-tabs>li>a {
            min-width: 60px
        }


        .tabs-left>.nav-tabs>li {
            float: none!important
        }

        .tabs-left>.nav-tabs>li>a,
        .tabs-left>.nav-tabs>li>a:focus,
        .tabs-left>.nav-tabs>li>a:hover {
            border-color: #C5D0DC;
            margin: 0 -1px 0 0
        }

        .tabs-left>.nav-tabs>li.active>a,
        .tabs-left>.nav-tabs>li.active>a:focus,
        .tabs-left>.nav-tabs>li.active>a:hover {
            border-color: #C5D0DC transparent #C5D0DC #C5D0DC;
            border-top-width: 1px;
            border-left: 2px solid #4C8FBD;
            margin: 0 -1px;
            -webkit-box-shadow: -2px 0 3px 0 rgba(0, 0, 0, .15)!important;
            box-shadow: -2px 0 3px 0 rgba(0, 0, 0, .15)!important
        }


        .tabs-right>.nav-tabs>li {
            float: none!important
        }

        .tabs-right>.nav-tabs>li>a,
        .tabs-right>.nav-tabs>li>a:focus,
        .tabs-right>.nav-tabs>li>a:hover {
            border-color: #C5D0DC;
            margin: 0 -1px
        }

        .tabs-right>.nav-tabs>li.active>a,
        .tabs-right>.nav-tabs>li.active>a:focus,
        .tabs-right>.nav-tabs>li.active>a:hover {
            border-color: #C5D0DC #C5D0DC #C5D0DC transparent;
            border-top-width: 1px;
            border-right: 2px solid #4C8FBD;
            margin: 0 -2px 0 -1px;
            -webkit-box-shadow: 2px 0 3px 0 rgba(0, 0, 0, .15);
            box-shadow: 2px 0 3px 0 rgba(0, 0, 0, .15)
        }


    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    {!! Form::model($logo, ['route' => array('profile.update'),'enctype'=>'multipart/form-data','id'=>'ImageForm']) !!}
    <section class="content">
        <div class="container">
            <div class="user-profile">

                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <div class="logo-thumnail col-sm-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-news thumbnail">
                                        <img class="editable img-responsive" src="
                                            @if(isset($logo->profile) == null || $logo->profile == '')
                                        {{ url('/upload/avatar5.png') }}
                                        @else
                                        {{ asset('upload/'.$logo->profile) }}
                                        @endif
                                                " id="image-defalt" class="img-circle1">
                                    </div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new "> ជ្រើសរូបភាព </span>
                                            <span class="fileinput-exists"> ផ្លាស់ប្តូររូបភាព </span>
                                            {{ Form::file('profile',['id'=>'images','accept'=>'image/*']) }}
                                        </span>
                                    </div>
                                    <div id="image_message"></div>
                                </div>
                            </div>
                        </span>
                    </div>


                    <div class="col-xs-12 col-sm-9">
                        <div class="tabbable tabs-left">

                            <div class="col-sm-12">
                                <div class=" tab-border">
                                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                                        <li class="active">
                                            <a href="#profile" data-toggle="tab"> <i class="green ace-icon fa fa-user"></i> ព័ត៌មានប្រវត្តិរូប</a>
                                        </li>
                                        <li><a href="#scurity" data-toggle="tab"> <i class="green ace-icon fa fa-lock"></i> សុវត្ថិភាពគណនី</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content contact-tab-border">

                                    <div class="tab-pane active" id="profile" role="tabpanel"><br>

                                        <div class="profile-user-info">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ឈ្មោះ​អ្នកប្រើប្រាស់ </div>
                                                <div class="profile-info-value">
                                                    <span><input type="text" value="{{$logo->name}}" class="input-hidden form-control" name="name"></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ឈ្មោះ​សម្រាប់ចូលប្រព័ន្ធ </div>
                                                <div class="profile-info-value">
                                                    <span>&nbsp;&nbsp;&nbsp; {{$logo->username}}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> លេខទូរសព្ទ </div>
                                                <div class="profile-info-value">
                                                    <span><input type="text" value="{{$logo->phone ? $logo->phone : '(+855) xxx xxx xxx'}}" class="input-hidden form-control" name="phone_number"></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ទីកន្លែង </div>
                                                <div class="profile-info-value">
                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                    <span>{{$logo->address ? $logo->address : 'Phnom Penh, Cambodia.'}}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ថ្ងៃ ខែ ​ឆ្នាំ​កំណើត </div>
                                                <div class="profile-info-value">
                                                    <span><input type="text" value="{{ date('d M Y', strtotime($logo->dob)) }}" class="input-hidden form-control" name="date_of_birth" id="date_of_birth"></span>
                                                </div>
                                            </div>


                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> last login </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $logo->last_login_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <div class="tab-pane" id="scurity" role="tabpanel"><br>
                                    <div class="profile-user-info">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">លេខសំងាត់​ចាស់ </div>
                                            <div class="profile-info-value">
                                                <span><input type="password" class="input-with form-control" name="old_password"></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">ពាក្យសម្ងាត់​ថ្មី </div>
                                            <div class="profile-info-value">
                                                <span><input type="password" class="input-with form-control" name="password"></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> បញ្ជាក់ពាក្យសម្ងាត់ </div>
                                            <div class="profile-info-value">
                                                <span><input type="password" class="input-with form-control" name="confirm_password"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    <div class="col-sm-12"><hr>
                        <button type="submit" class="btn btn-primary pull-right" id="submit1">
                            <i class="fa fa-floppy-o"></i> ធ្វើបច្ចុប្បន្នភាព
                        </button>
                    </div>

                </div>
            </div>
        </div>
        {{ Form::close() }}


        <script type="text/javascript">
            $('#date_of_birth').datepicker({
                autoclose: true,
                format: 'dd M yyyy',
                todayHighlight: true
            });

        </script>
    </section>

@endsection


