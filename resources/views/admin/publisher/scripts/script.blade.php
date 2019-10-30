<script>
	$(document).ready(function() {
        var url = "{{ URL::to('admin/publisher/create') }}";
		var table = $('#publisher-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\PublisherController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
                    data.search = $('#search').val();
                    data.field_type = $('#field_name option:selected').data('type');
                }
            },
            "columnDefs": [
                {
                    targets: [3, 4],
                    render: function (data, type, row) {
                        if(data != null) {
                            return type === 'display' && data.length > 100 ?
                                data.substr( 0, 100 ) +'…' :
                                data;
                        } else {
                            return data;
                        }
                    }
                },
                {"className": "text-center", "targets": 8}
            ],
            columns: [
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},
                {data: 'description', name: 'description'},
                {data: 'created_name', name: 'created_user.fullname'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_name', name: 'updated_user.fullname'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_name', name: 'deleted_user.fullname'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'status_delete', name: 'status_delete'}
            ],
            responsive: true,
            "scrollX": true,   // enables horizontal scrolling
            dom: 'lBfrtip',            
            buttons: [
                {
                    extend: 'excel',
                    text: 'Export Excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: 'th:not(:first-child)'
                    }
                }
            ]
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

        $('#btn-create').on('click', function(event) {
            event.preventDefault();
            window.location.href = url;
        });
    });
</script>