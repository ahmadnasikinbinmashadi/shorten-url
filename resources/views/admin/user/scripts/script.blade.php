<script>
    $(document).ready(function() {
        var table = $('#trustees-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\UserController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
                    data.search = $('#search').val();
                }
            },
            columns: [
                {data: 'email', name: 'email', searchable: true},
                {data: 'fullname', name: 'fullname', searchable: true},
                {data: 'is_admin', name: 'is_admin'},
                {data: 'roles', name: 'roles.name', searchable: true},
                {data: 'status', name: 'status', searchable: true},
                {data: 'last_login', name: 'last_login', class: 'center-align', searchable: true},
                {data: 'updated_at', name: 'updated_at', class: 'center-align', searchable: true},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ],
            responsive: true,
            "scrollX": true,   // enables horizontal scrolling
            dom: 'lBfrtip',            
            buttons: ['excel']
        });

        $(".dt-buttons").css('margin-left', '10px');
        $("div.dataTables_length label").addClass('pull-left');

        /* Reload*/
        $('#refresh').on('click', function(event){
            event.preventDefault();
            table.ajax.reload();
        });

        /* change password */
        $('[data-tables=true]').on('click', '[data-button=change-password]', function(e) {
            e.preventDefault();
            var url = $(this).data('href');
            
            /* load the url and show modal on success */
            $('#modal-change-password .modal-body').load(url, function() {
                $('#modal-change-password').modal('show');
            });
        });
    });
</script>