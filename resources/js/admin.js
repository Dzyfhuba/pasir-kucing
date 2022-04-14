import 'datatables.net';
import 'datatables.net-dt/css/jquery.dataTables.min.css';
import { createPopper } from '@popperjs/core';

// if #admin loaded
if ($('#admin').length) {
    console.log('admin.js loaded');
    $('#tableCert').DataTable({
        "columnDefs": [
            { "sClass": "dt-center", "aTargets": [0] },
            { "sClass": "dt-center", "aTargets": [2], "bSortable": false },
            { "sClass": "dt-center", "aTargets": [3], "bSortable": false },
            { "sClass": "dt-center", "aTargets": [4], "bSortable": false }
        ]
    });

    document.querySelectorAll('#delete').forEach(function(e) {
        $(e).on('click', function() {
            // confirm before delete
            if (confirm('Are you sure you want to delete this certificate?')) {
                // get cert
                let cert = $(this).data('cert');
                // delete cert
                // ajax header
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/aboutus/cert/' + cert + '/delete',
                    type: 'DELETE',
                    success: function(result) {
                        $(e).closest('tr').remove();
                        console.log(result);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
}