$(document).ready(function() {
    $('#data-users').DataTable({
        "processing": true,
        "serverSide": true,
        "retrieve": true,
        "columnDefs": [ {
            "targets": [6], // column or columns numbers
            "orderable": false,  // set orderable for selected columns
        }],
        "ajax": url,
        "columns": [
            {data: 'key'},
            {data: 'email',},
            {data: 'name'},
            {data: 'user_group[].name'},
            {data: 'phone'},
            {data: 'roles[].display_name'},
            {
                "render": function (data, type, full)
                {
                    return ''+//'<a class="btn btn-xs btn-info" href="'+full.view+'"><i class="fa fa-eye"></i></a>  '+
                        '<a class="btn btn-xs btn-primary" href="'+full.edit+'"><i class="fa fa-edit"></i></a>  '+
                        '<a class="btn btn-xs btn-danger" href="'+full.delete+'"><i class="fa fa-trash-o"></i></a>';
                }
            },

        ]
    });
});