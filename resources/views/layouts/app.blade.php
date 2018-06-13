<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post ID</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js'></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


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
                <div class="alert alert1 alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Please input data
                </div>
            </div>
            @if(session()->has('success'))
            <div class="msg">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('success') }}
                </div>
            </div>
            @endif
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
