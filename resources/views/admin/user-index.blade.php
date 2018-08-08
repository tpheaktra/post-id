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
                                    <th>ឈ្មោះប្រើប្រាស់</th>
                                    <th>ឈ្មោះ</th>
                                    <th>ឈ្មោះក្រុម</th>
                                    <th>លេខទូរសព្ទ</th>
                                    <th>តួនាទី</th>
                                    <th>ប្រតិបត្តិការ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <script type="text/javascript">
                            var url = "{{ route('user.getUserView') }}";
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


