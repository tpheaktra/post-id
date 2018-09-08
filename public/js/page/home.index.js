$(document).ready(function() {
    $('#datatable1').DataTable({
        "processing": true,
        "serverSide": true,
        //"searching": false,
        "retrieve": true,
        "ajax": url,
        "columns": [
           // {data: 'key'},
            {data: 'DT_Row_Index'},
            {data: 'g_patient'},
            {data: 'g_age'},
            {data: 'g_sex'},
            {data: 'g_phone'},
            {data: 'interview_code'},
            {
                "render": function (data, type, full, meta)
                {
                    return '<a data-hint="'+full.txtprint_result+'" class="btn btn-xs btn-default hint--left hint--default" href="'+full.printInterviewResult+'"><i class="fa fa-download"></i></a> '+
                        '<a data-hint="'+full.txtview+'" class="btn btn-xs btn-success hint--left hint--success" href="'+full.view+'"><i class="fa fa-eye"></i></a> '+
                        //'<a data-hint="'+full.txtedit+'"​​ class="btn btn-xs btn-primary hint--left hint--primary" href="'+full.edit+'"><i class="fa fa-edit"></i></a> '+
                        '<a data-hint="'+full.txtprint+'" class="btn btn-xs btn-info hint--left hint--info" href="'+full.print+'"  target="blank"><i class="fa fa-print"></i></a> '+
                        '<a data-hint="'+full.txtdelete+'" class="btn btn-xs btn-danger hint--left hint--error" href="'+full.delete+'"><i class="fa fa-trash-o"></i></a>';
                }
            },
        ],
       // "order": [[1, 'asc']],
       // deferRender: true,
    });

    $.fn.dataTable.ext.errMode = 'throw';
});