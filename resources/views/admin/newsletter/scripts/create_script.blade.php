@include('backend::admin.faq.scripts.function')

<script type="text/javascript">
    $(document).ready(function() {
        loadTinyMce();

        //tambah group
        $('#btn_show_user').on('click', function(e) {
            $('#modal-recepient').modal('show');	
            e.preventDefault();

            $('#modal-recepient').on('shown.bs.modal', function () {
            	$('#abc-table').DataTable().destroy();
		        $('#abc-table').DataTable( {
		        	processing: true,
		            serverSide: true,
		            ajax: {
		                "url": '{!! action('Admin\NewsletterController@memberDatatables') !!}'
		            },
		            columnDefs: [ {
			            orderable: false,
			            targets:   0,
			            'className': 'text-center',
				         'render': function (data, type, full, meta){
				             return '<input type="checkbox" class="icheck" name="id[]" value="' 
				                + $('<div/>').text(data).html() + '">';
				         }
			        } ],
		            columns: [
		                {data: 'id', name: null},
		                {data: 'id', name: 'id'},
		                {data: 'fullname', name: 'fullname'}
		            ],
			        order: [[ 1, 'asc' ]]
			    } );
			});
        });
    });
</script>