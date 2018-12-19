$(document).ready(function() {
    //$('#result-interview').DataTable();
    $('#result-interview').DataTable({
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
            {data: 'sex.name_kh'},
            {data: 'g_phone'},
            {data: 'printcardno'},
            {data: 'userinterview.name'},
            {data: 'interviewdate'},
            {
                "render": function (data, type, full)
                {

                        if(down1 == 'post-id-export') {
                             down = '<a data-hint="' + full.txtprint_result + '" class="btn btn-xs btn-default hint--left hint--default" href="' + full.printInterviewResult + '"><i class="fa fa-download"></i></a> ';
                        }

                        if(view1 == 'post-id-view') {
                            view    = '<a data-hint="'+full.txtview+'" class="btn btn-xs btn-success hint--left hint--success" href="'+full.view+'" target="blank"><i class="fa fa-eye"></i></a> ';
                        }

                        if (full.userid == userid && edit1 == 'post-id-edit') {
                            edit = '<a data-hint="' + full.txtedit + '"​​ class="btn btn-xs btn-primary hint--left hint--primary" href="' + full.edit + '" target="blank"><i class="fa fa-edit"></i></a> ';
                        }else{edit='';}


                        if(print1 == 'post-id-print') {
                            print   = '<a data-hint="'+full.txtprint+'" class="btn btn-xs btn-info hint--left hint--info" href="'+full.print+'"  target="blank"><i class="fa fa-print"></i></a> ';
                        }

                        if (full.userid == userid && deleted1 == 'post-id-delete') {
                            deleted = '<a data-hint="'+full.txtdelete+'" class="btn btn-xs btn-danger hint--left hint--error" href="'+full.delete+'"><i class="fa fa-trash-o"></i></a>';
                        }else{deleted='';}

                    return down+view+edit+deleted;
                }
            },
        ],
        'columnDefs': [
            {targets: [0,2,3,8],"className": "text-center"},
           // { targets: '_all', "className": "small " },
        ],
        "order": [[1, 'asc']],
        deferRender: true,
    });
    //$.fn.dataTable.ext.errMode = 'throw';
});