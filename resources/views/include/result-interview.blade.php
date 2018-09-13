<table id="result-interview" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <th>ល.រ</th>
    <th>ឈ្មោះអ្នកជំងឺ</th>
    <th>អាយុ</th>
    <th>ភេទ</th>
    <th>លេខទូរស័ព្ធ</th>
    <th>លេខកូដសម្ភាសន៍</th>
    <th>អ្នកសំភាស៍</th>
    <th>សកម្មភាព</th>
    </thead>
    <tbody>
        @foreach($view as $k => $re)
            <tr>
                <td>{{++$k}}</td>
                <td>{{$re->g_patient}}</td>
                <td>{{$re->g_age}}</td>
                <td>{{$re->g_sex}}</td>
                <td>{{$re->g_phone}}</td>
                <td>{{$re->interview_code}}</td>
                <td>{{$re->interview_by}}</td>
                <td align="center">
                    @permission('post-id-export')
                        <a data-hint="លទ្ធផលវាយតម្លៃសំរាប់អ្នកជំងឺ" class="btn btn-xs btn-default hint--left hint--default" href="{{route('printInterviewResult.print', Crypt::encrypt($re->id))}}">
                            <i class="fa fa-download"></i></a>
                    @endpermission
                    @permission('post-id-view')
                        <a data-hint="មើលពិន្ទុនៃការសំភាស" class="btn btn-xs btn-success hint--left hint--success" target="blank" href="{{route('view.data', Crypt::encrypt($re->id))}}">
                            <i class="fa fa-eye"></i></a>
                    @endpermission
                    @if(auth::user()->id == $re->user_id)
                        @permission('post-id-edit')
                        <a data-hint="ការធ្វើបច្ចប្បន្នភាព"​​ class="btn btn-xs btn-primary hint--left hint--primary" target="blank" href="{{route('editpatient.edit', Crypt::encrypt($re->id))}}">
                            <i class="fa fa-edit"></i></a>
                        @endpermission
                    @endif
                    @permission('post-id-print')
                    <a data-hint="បោះពុម្ព" class="btn btn-xs btn-info hint--left hint--info" href="{{route('print.data', Crypt::encrypt($re->id))}}"  target="blank">
                        <i class="fa fa-print"></i></a>
                    @endpermission
                    @if(auth::user()->id == $re->user_id)
                    @permission('post-id-delete')
                    <a data-hint="លុបការសំភាស" class="btn btn-xs btn-danger hint--left hint--error" href="{{route('deletepatient.delete', Crypt::encrypt($re->id))}}">
                        <i class="fa fa-trash-o"></i></a>
                    @endpermission
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>

</table>