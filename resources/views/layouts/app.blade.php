<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POSTID - @yield('title')</title>
    <link href="{{asset('images/icon.gif')}}" rel="icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font khmer battambang -->
    <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js'></script>

    <link href="{{asset('js/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>

    <link href="{{asset('js/select2/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2/select2.min.js')}}"></script>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('js/datepicker/css/bootstrap-datepicker.min.css')}}" />
    <script type="text/javascript" src="{{asset('js/datepicker/js/bootstrap-datepicker.min.js')}}"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <link href="{{asset('css/hint.css')}}" rel="stylesheet" />

</head>
<body>
    <div class="wrapper" id="header">

        <nav class="header navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('include.header-top')
                </div>
            </div>
            @include('include.message')
        </nav>

        <div class="container">
            <div class="wrap-home">
                @include('include.menu-logo')
            </div>
        </div>
        @include('include.loading-ajax')
    </div><!-- end header -->


    <main class="wrapper" id="content">
        @yield('content')
    </main>

    <!-- Modal -->
    @if ($check_base->hos_base <= 0)
        <script type="text/javascript">
            $( document ).ready( function() {
                $( '#myModal' ).modal(
                    {backdrop: 'static',
                    keyboard: false});
            });
        </script>
        <style>
            .title-error{
                color: #428bca;
            }
            .modal-content{
                border-left: 4px solid #428bca;
            }
            .modal-body{
                padding: 15px 20px !important;
            }
            .base-hospital li{
                padding: 10px;
            }
        </style>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header title-error">
                        <h4 class="modal-title">សូមជ្រើសរើស - មន្ទីរពេទ្យ </h4>
                    </div>
                    <div class="modal-body">
                        <ul class="base-hospital">
                            @foreach ($getAllBase as $key => $hosp)
                                <li style="cursor: pointer"><span data-name="{{$hosp->hospital_id}}" class="submit_value">មន្ទីពេទ្យ - {{ $hosp->name_kh  }}</span> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <script>
            $('.base-hospital li span').on('click', function(){
                var hospId = $(this).attr('data-name');
                var url = "{{url('/patient/interview/change/base/')}}/"+hospId;
                window.location = url;
            })
        </script>
    @endif

    <div class="wrapper" id="footer">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="{{ asset('images/usaid.png') }}">
                        <span class="footer-develop">រក្សាសិទ្ធិគ្រប់បែបយ៉ាងដោយនាយកដ្ឋានផែនការនិង ព័ត៌មានសុខាភិបាលនៃក្រសួងសុខាភិបាល DPHI/MoH. <?php echo date('Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/jQuery.print.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#datatable').DataTable();
        $("a").tooltip({placement:"top"});
        setTimeout(function() {
            $(".add_hide1").addClass("autho-hide1");
            $('.autho-hide1').fadeOut();
        },9000);
    </script>

    <script src="{{ asset('js/page/'.Route::currentRouteName().'.js') }}"></script>
</body>
</html>
