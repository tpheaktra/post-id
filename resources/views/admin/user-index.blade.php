@section('title','Users')
@extends('layouts.app')

@section('content')
    <style>
        .user-mangement{
            margin-top: 20px;
        }
    </style>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('user.create')}}" class="btn btn-primary"> <i class="glyphicon glyphicon-plus"></i> អ្នក​ប្រើប្រាស់​ថ្មី</a>
                    <div class="user-mangement">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ឈ្មោះប្រើប្រាស់</th>
                                    <th>ឈ្មោះ</th>
                                    <th>ឈ្មោះក្រុម</th>
                                    <th>លេខទូរសព្ទ</th>
                                    <th>តួនាទី</th>
                                    <th>ប្រតិបត្តិការ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key =>$val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>TO</td>
                                        <td>0986687678</td>
                                        <td>TO</td>
                                        <td>
                                            <a href="#">
                                                កែប្រែ
                                            </a> /
                                            <a href="#">លុប</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $user->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


