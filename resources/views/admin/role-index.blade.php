@section('title','Roles')
@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <div class="head-title-add">
                    <a href="{{ route('role.create') }}" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus"></i> តួនាទីថ្មី
                    </a>
                </div>

                <div class="user-mangement">

                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ឈ្មោះ​សំរាប់​ប្រព័ន្ធ</th>
                                    <th>បង្ហាញតូនាទី</th>
                                    <th>ប្រតិបត្តិការ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key=> $value)
                                    <tr class=" @if($value->name == 'supperadmin') hidden @endif ">
                                        <td>{{ ++$key }}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->display_name }}</td>
                                        <td align="center">
                                            @permission('role-edit')
                                                <a data-hint="ការធ្វើបច្ចប្បន្នភាព"​​ class="btn btn-xs btn-primary hint--left hint--primary" href="{{route('role.edit',Crypt::encrypt($value->id))}}"><i class="fa fa-edit"></i></a>
                                            @endpermission

                                            @permission('role-delete')
                                                @if($value->name != 'administrator')
                                                  <a data-hint="លុបការសំភាស" class="btn btn-xs btn-danger hint--left hint--error" onclick="return confirm('Are you sure you want to delete?');" href="{{route('role.delete',Crypt::encrypt($value->id))}}">
                                                       <i class="fa fa-trash-o"></i>
                                                  </a>
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
    </section>
@endsection
