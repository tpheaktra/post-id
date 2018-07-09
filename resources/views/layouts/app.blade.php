<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POSTID - @yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font khmer battambang -->
    <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js'></script>
    <link href="{{asset('js/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>

    <link href="{{asset('js/select2/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2/select2.min.js')}}"></script>

    <script src="{{asset('js/jQuery.print.js')}}" type="text/javascript"></script>
    <link href="{{asset('js/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.bootstrap.min.js')}}"></script>

</head>
<body>
    <div class="wrapper" id="header">
        <nav class="header navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto pull-right">
                            @guest

                                @else
                                    <li><a class="nav-link">{{ Auth::user()->name }}  </a> </li>
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
                <div class="add_hide alert alert1 alert-danger alert-dismissable">
                   សូមបញ្ជូលព័ត៌មានចាំបាច់.
                </div>
            </div>


            @if(!empty($errors->first()))
                <div class="msg">
                    <div class="add_hide1 alert-danger alert-dismissable">
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="msg">
                    <div class="add_hide1  alert-success alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif

            @if(session()->has('danger'))
                <div class="msg">
                    <div class="add_hide1  alert-danger alert-dismissable">
                        {{ session()->get('danger') }}
                    </div>
                </div>
            @endif

        </nav>

        <!-- end menu top -->
        <div class="container">
            <div class="wrap-home">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo-home">
                            <table style="margin:auto;">
                                <tbody>
                                    <tr>
                                        <td style="padding-right:30px;">
                                            <div><img src="{{asset('images/moh_logo.jpg')}}"></div>
                                            <h4 style="margin:0 auto 0px;font-size:14px;">ក្រសួង&#8203;សុខាភិបាល</h4>
                                        </td>
                                        <td>
                                            <h3 style="font-family:'Khmer OS Muol', 'Khmer Moul', 'Kh Muol';font-weight:normal; text-shadow: 0 0 5px #bbb; -webkit-text-shadow: 0 0 5px #bbb; -moz-text-shadow: 0 0 5px #bbb; color:#153899; margin:45px 0 10px 0;">ការធ្វើអត្តសញ្ញាណកម្មគ្រួសារក្រីក្រនៅមន្ទីពេទ្យ</h3>
                                            <div><img src="{{asset('images/head-swirl.jpg')}}" style="height:20px;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-sm-12">
                        <ul class="home-menu">
                            <li class="@if(Route::currentRouteName() == 'home.index' || Route::currentRouteName() == 'homehome' || Route::currentRouteName() == 'editpatient.edit' || Route::currentRouteName() == 'view.data') active @endif"><a href="{{route('home.index')}}">ការធ្វើអត្តសញ្ញាណកម្ម</a></li>
                            <li class="@if(Route::currentRouteName() == 'user.index' || Route::currentRouteName() == 'user.create') active @endif"><a href="{{route('user.index')}}">គ្រប់គ្រងអ្នកប្រើប្រាស់</a></li>
                            <li class="@if(Route::currentRouteName() == 'role.index' || Route::currentRouteName() == 'role.create') active @endif"><a href="{{route('role.index')}}">គ្រប់គ្រងតួនាទី</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>



            <!-- loding image -->
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



    <main class="wrapper" id="content">
        @yield('content')
    </main>



    <div class="wrapper" id="footer">
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





    <script type="text/javascript">
        $('#datatable').DataTable();
        $("a").tooltip({
            placement:"top"
        });
        setTimeout(function() {
            $(".add_hide1").addClass("autho-hide1");
            $('.autho-hide1').fadeOut();
        },9000);
    </script>
</body>
</html>
