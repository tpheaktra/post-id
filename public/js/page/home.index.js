$(document).ready(function() {
    $('#datatable1').DataTable({
        "processing": true,
        "serverSide": true,
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
                    return '<a class="btn btn-xs btn-success" href="'+full.view+'"><i class="fa fa-eye"></i></a> '+
                        '<a class="btn btn-xs btn-primary" href="'+full.edit+'"><i class="fa fa-edit"></i></a> '+
                        '<a class="btn btn-xs btn-info" href="'+full.print+'"  target="blank"><i class="fa fa-print"></i></a> '+
                        '<a class="btn btn-xs btn-danger" href="'+full.delete+'"><i class="fa fa-trash-o"></i></a>';
                }
            },
        ]
    });

});