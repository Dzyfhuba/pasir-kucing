import 'datatables.net';
import 'datatables.net-dt/css/jquery.dataTables.min.css';
import { createPopper } from '@popperjs/core';

// if #admin loaded
if ($('#admin').length) {
    console.log('admin.js loaded');
    $('#datatable').DataTable();

    document.querySelectorAll('#deleteCert').forEach(function(e) {
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
    document.querySelectorAll('#deleteService').forEach(function(e) {
        $(e).on('click', function() {
            // confirm before delete
            if (confirm('Are you sure you want to delete this service?')) {
                // get cert
                let id = $(this).data('service');
                // ajax header
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/service/' + id,
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