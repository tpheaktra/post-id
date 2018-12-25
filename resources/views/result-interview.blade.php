@section('title','Error 404')
@extends('layouts.app')
@section('content')
    <div class="container content">
        <div class="col-sm-12">
            <h3 class="hospital_title" align="center">ទិន្នន័យ​អ្នកជំងឺ</h3>
        </div>

        <div class="data-list">
            <table id="result-interview" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <th>ល.រ</th>
                <th>ឈ្មោះអ្នកជំងឺ</th>
                <th>អាយុ</th>
                <th>ភេទ</th>
                <th>លេខទូរស័ព្ធ</th>
                <th>លេខកូដសម្ភាសន៍</th>
                <th>អ្នកសំភាស៍</th>
                <th>ថ្ងៃសម្ភាសន៍</th>
                <th>សកម្មភាព</th>
                </thead>
                <tbody>

                @permission('post-id-export')
                <script>var down1 = "post-id-export" ;</script>
                @endpermission

                @permission('post-id-view')
                <script>var view1 = "post-id-view" ;</script>
                @endpermission


                @permission('post-id-edit')
                <script>var edit1 = "post-id-edit" ;</script>
                @endpermission


                @permission('post-id-print')
                <script>var print1 = "post-id-print" ;</script>
                @endpermission


                @permission('post-id-delete')
                <script>var deleted1 = "post-id-delete" ;</script>
                @endpermission


                <script>
                    var userid = "{{auth::user()->id}}";
                    var url = "{{route('view.getPatientView')}}";
                </script>
                </tbody>
            </table>

        </div>
    </div>
@endsection




