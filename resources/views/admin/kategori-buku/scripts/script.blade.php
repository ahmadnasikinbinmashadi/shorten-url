<script>
	$(document).ready(function() {
		var table = $('#kateg-buku-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\KatBukuController@datatables') !!}',
                "data": function(data) {
                    data.field_name   = $('#field_name option:selected').val();
                    data.operator     = $('#operator option:selected').val();
                    data.filter_value = $('#search').val();
                    data.field_type   = $('#field_name option:selected').data('type');
                }
            },
            "columnDefs": [
                {"className": "text-center", "targets": 10}
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'kategori_bukus.name'},
                {data: 'parent_id', name: 'parent_id'},
                {data: 'parent_name', name: 'parents.name'},
                {data: 'created_name', name: 'created_user.fullname'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_name', name: 'updated_user.fullname'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_name', name: 'deleted_user.fullname'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'status_delete', name: 'status_delete'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ],
            "order": [[7, "desc"]],
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
            // clear filter
            clear_filter_data();
            // reload datatable
            table.ajax.reload();
        });

        $('#btn-search').on('click', function() {
            event.preventDefault();
            table.ajax.reload();
        });
    });
</script>