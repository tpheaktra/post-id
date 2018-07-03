@section('title','Roles')
@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('role.create') }}" class="btn btn-primary">
                    <i class="glyphicon glyphicon-plus"></i> តួនាទីថ្មី
                </a>

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
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->display_name }}</td>
                                        <td>
                                            @permission('role-edit')
                                            <a href="#">កែប្រែ</a>
                                            @endpermission

                                            @permission('role-delete')
                                            @if($value->name != 'admin')
                                            / <a onclick="return confirm('Are you sure you want to delete?');" href="#">
                                                   លុប
                                              </a>
                                            @endif
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{$roles->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection
