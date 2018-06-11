<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Post ID</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        /*body{ 
            margin-top:40px; 
        }*/

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
            margin-top: 40px;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
          width: 30px;
          height: 30px;
          text-align: center;
          padding: 6px 0;
          font-size: 12px;
          line-height: 1.428571429;
          border-radius: 15px;
        }

        label{font-weight: 100 !important}

        .header .navbar-nav>li>a{ padding: 3px 0px !important }
        .header img{ max-width: 50% }
        .content{ border: 1px solid #eee; }
        .form-group-post{
            border: 1px solid #eee;
            float: left;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .form-group-post h4{ 
            text-decoration: underline;
        }
        .form-group-post h3{
            color: #007fff; 
            font-size: 22px !important; 
        }
        
        .nextBtn{
            margin-bottom: 20px !important;
        }

        .footer{
                float: left;
                width: 100%;
                padding: 5px 0px;
                margin-top: 50px;
                background: #F6F6F6;
                border-top: 1px solid #DDDDDD;
                font-size: 14px;
        }
        .footer img{ 
                float: left;
                max-width: 100%;
                padding-right: 60px;
        }
        .footer .footer-develop{
            text-align: center;
            line-height: 65px;
        }

        .tb_grid td{
            padding: 4px;
        }
        .form-control{
            border-radius: 0px !important;
        }
        select.form-control:not([size]):not([multiple]){ height: auto !important; }
        .table>thead>tr>th{ border-bottom: 1px solid #dadada !important; }
        .has-noted{ color: #dc3545; }
        /*selct2*/
        .select2-container--default .select2-selection--single{
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 0px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow,
        .select2-container .select2-selection--single{
            height: 35px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{  line-height: 35px !important;}
        .has-error .select2-selection--single{
            border: 1px solid #a94442 !important;}
        .alert{
            display: none;
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 0px !important;
            padding: 10px 30px !important;
        }
        .msg{
            position: fixed;
            margin: 0 auto;
            right: 0;
            left: 0;
            z-index: 1;
            width: 44%;
        }
        input[type=radio]{
            float: left;
        }
        .error{
            color: #a94442;
        }
        .li-none li{ list-style-type: none;}
        /*.modal-content{*/
            /*background-color: inherit !important;*/
            /*border: none !important;*/
            /*-webkit-box-shadow: inset hoff voff blur color !important;*/
            /*-moz-box-shadow: inset hoff voff blur color !important;*/
            /*box-shadow: inset hoff voff blur color !important;*/
        /*}*/
    </style>

    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

    {{--<script type='text/javascript'--}}
    {{--src='//cdnjs.cloudflare.com/ajax/libs/select2/3.4.6/select2.js'></script>--}}

    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js'></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    {{--<!-- Include Select2 CSS -->--}}
    {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.css" />--}}

    {{--<!-- CSS to make Select2 fit in with Bootstrap 3.x -->--}}
    {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2-bootstrap.min.css" />--}}

    {{--<!-- Include Select2 JS -->--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.js"></script>--}}

    {{--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
    {{--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>--}}

</head>
<body>
    <div id="app">

        <nav class="header navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a href="{{ url('/') }}">
                   <img src="{{ asset('images/health_center.png') }}">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pull-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                           <!--  <li><a class="nav-link">{{ Auth::user()->name }} </a></li>
                            <li><a class="nav-link">|</a></li> -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    ចាកចេញ
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="msg">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Please input data
                </div>
            </div>
        </nav>



        <div>
            <div class="modal modal-primary" id="loading">
                <div class="modal-dialog" style="top:30%">
                    <div class="">
                        <div class="modal-body" style="text-align: center;">
                            <img src="{{ asset('images/loading.gif') }}"/>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>



        <main class="py-4">
            @yield('content')
        </main>


        <div class="wrapper">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="{{ asset('images/usaid.png') }}">
                            <span class="footer-develop">រក្សាសិទ្ធិគ្រប់បែបយ៉ាងដោយនាយកដ្ឋានផែនការនិង ព័ត៌មានសុខាភិបាលនៃក្រសួងសុខាភិបាល DPHI/MoH. 2013</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
