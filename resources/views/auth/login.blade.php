<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POSTID - ចូលប្រើប្រព័ន្ធ</title>
    <!-- Fonts -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- font khmer battambang -->
    <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>
<body>
    <style>
        .card{ height: 300px !important;}
        .form-control{  height:40px !important;}
        .card-body{ margin-top: 25px !important;}
        .justify-content-center{ margin-top: 200px;}
        body{font-family: 'Battambang', Helvetica,Arial,sans-serif !important;}
        .card-header{
            padding: 15px 0;
            font-size: 20px;
            margin-bottom: 0;
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 0px !important;
            border-color: #dddddd !important;
            background: linear-gradient(to bottom, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
            background: -moz-linear-gradient(top, #ffffff 0%, #f6f6f6 47%, #ededed 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
            background: -webkit-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
            background: -o-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
            background: -ms-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .card-header{
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">ចូលប្រើប្រាស់ប្រព័ន្ធ​</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">ឈ្មោះប្រើប្រាស់</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}"  autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">ពាក្យសំងាត់</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                            {{--<div class="checkbox">--}}
                            {{--<label>--}}
                            {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ចូលប្រើប្រាស់
                                    </button>

                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
