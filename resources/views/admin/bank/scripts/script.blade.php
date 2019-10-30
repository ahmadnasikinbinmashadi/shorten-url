<script>
	$(document).ready(function() {
		var table = $('#banks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\BankController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
                    data.search = $('#search').val();
                }
            },
            "columnDefs": [
                {"className": "text-center", "targets": 8}
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'created_name', name: 'created_user.fullname'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_name', name: 'updated_user.fullname'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_name', name: 'deleted_user.fullname'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'status_delete', name: 'status_delete'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });

		/* Reload*/
        $('#refresh').on('click', function(event){
            event.preventDefault();
            table.ajax.reload();
        });

        $('#btn-search').on('click', function() {
            event.preventDefault();
            table.ajax.reload();
        });
    });
</script>