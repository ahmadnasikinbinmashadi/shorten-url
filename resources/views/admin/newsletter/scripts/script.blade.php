<script>
	$(document).ready(function() {
		var table = $('#newsletter-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\NewsletterController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
                    data.search = $('#search').val();
                }
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                if ( aData.deleted_at != null )
                {
                    $('td', nRow).css('background-color', '#f2dede');
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'subject', name: 'subject'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_at', name: 'deleted_at'},
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

        $('#btn-search').on('click', function() {
            event.preventDefault();
            table.ajax.reload();
        });
    });
</script>