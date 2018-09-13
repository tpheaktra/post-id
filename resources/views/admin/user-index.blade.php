@section('title','Users')
@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="head-title-add">
                        <a href="{{route('user.create')}}" class="btn btn-primary"> <i class="glyphicon glyphicon-plus"></i> អ្នក​ប្រើប្រាស់​ថ្មី</a>
                    </div>

                    <div class="user-mangement">
                        <table id="data-users" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ឈ្មោះ</th>
                                    <th>ឈ្មោះប្រើប្រាស់</th>
                                    <th>ឈ្មោះក្រុម</th>
                                    <th>លេខទូរសព្ទ</th>
                                    <th>តួនាទី</th>
                                    <th>ប្រតិបត្តិការ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataUser as $key =>$u)

                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->username}}</td>
                                        <td>
                                            @foreach($u['user_group'] as $g =>$gr)
                                                <span class="btn btn-xs btn-default">{{$gr->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$u->phone ? $u->phone : '(+855) xxx xxx xxx'}}</td>
                                        <td>
                                            @foreach($u['roles'] as $r =>$rl)
                                                <span class="btn btn-xs btn-default">{{$rl->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @permission('user-edit')
                                                @if($u->username != 'supperadmin')
                                                    <a data-hint="ការធ្វើបច្ចប្បន្នភាព"​​ class="btn btn-xs btn-primary hint--left hint--primary" href="{{route('user.edit', Crypt::encrypt($u->id))}}"><i class="fa fa-edit"></i></a>
                                                @endif
                                                @if($u->username == 'supperadmin' && auth::user()->id == $u->id)
                                                    <a data-hint="ការធ្វើបច្ចប្បន្នភាព"​​ class="btn btn-xs btn-primary hint--left hint--primary" href="{{route('user.edit', Crypt::encrypt($u->id))}}"><i class="fa fa-edit"></i></a>
                                                @endif
                                            @endpermission

                                            @permission('user-delete')
                                            @if(auth::user()->id != $u->id)
                                                @if($u->username != 'supperadmin')
                                                    <a data-hint="លុបការសំភាស" class="btn btn-xs btn-danger hint--left hint--error" href="{{route('user.delete', Crypt::encrypt($u->id))}}"><i class="fa fa-trash-o"></i></a>
                                                @endif
                                            @endif
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


