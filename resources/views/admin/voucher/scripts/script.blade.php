<script>
	$(document).ready(function() {
        var url = "{{ URL::to('admin/voucher/create') }}";
		var table = $('#voucher-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\VoucherController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator   = $('#operator option:selected').val();
                    data.filter_value = $('#search').val();
                    data.field_type = $('#field_name option:selected').data('type');
                }
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                if ( aData.deleted_at != null )
                {
                    $('td', nRow).css('background-color', '#f2dede');
                }
            },
            "columnDefs": [
                {"className": "text-center", "targets": 8}
            ],
            columns: [
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false},
                {data: 'id', name: 'id'},
                {data: 'agent_name', name: 'agent_name'},
                {data: 'session', name: 'session'},
                {data: 'voucher_value', name: 'voucher_value'},
                {data: 'incentive', name: 'incentive'},
                {data: 'type', name: 'type'},
                {data: 'total', name: 'total'},
                {data: 'count_usage', name: 'count_usage', searchable: false},
                {data: 'start_at', name: 'start_at'},
                {data: 'expire_at', name: 'expire_at'},
                {data: 'created_at', name: 'created_at'},
                {data: 'created_name', name: 'created_user.fullname'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'updated_name', name: 'updated_user.fullname'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'deleted_name', name: 'deleted_user.fullname'},
                {data: 'status', name: 'status'}
            ],
            "order": [[1, "desc"]],
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

        table.on( 'draw', function () {
            //bootstrap dropdwon
            $('.dropdown-menu').parent().on('shown.bs.dropdown', function () {
                var $menu = $("ul", this);
                offset = $menu.offset();
                position = $menu.position();
                $('body').append($menu);
                $menu.show();
                $menu.css('position', 'absolute');
                $menu.css('top', (offset.top) + 'px');
                $menu.css('left', (offset.left) + 'px');
                $(this).data("myDropdownMenu", $menu);
            });
            $('.dropdown-menu').parent().on('hide.bs.dropdown', function () {
                $(this).append($(this).data("myDropdownMenu"));
                $(this).data("myDropdownMenu").removeAttr('style');

            });
        });

		/* Reload*/
        $('#refresh').on('click', function(event){
            event.preventDefault();
            // clear filter
            clear_filter_data();
            // reload datatable
            table.ajax.reload();
        });

        $('#btn-search').on('click', function(event) {
            event.preventDefault();
            table.ajax.reload();
        });

        $('#btn-create').on('click', function(event) {
            event.preventDefault();
            window.location.href = url;
        });
    });
</script>