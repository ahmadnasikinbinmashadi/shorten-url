<script>
	$(document).ready(function() {
		// $('.select2').select2();
        $('.iconpicker').iconpicker();

		var table = $('#menus-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action('Admin\MenuController@datatables') !!}',
            "columnDefs": [
                {"className": "text-center", "targets": 3}
            ],
            columns: [
                {data: 'display_name', name: 'menus.display_name'},
                {data: 'parent_name', name: 'parents.display_name'},
                {data: 'href', name: 'href'},
                {data: 'is_active', name: 'is_active'},
                {data: 'position', name: 'position'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });

		/* Reload*/
        $('#refresh').on('click', function(event){
          event.preventDefault();
          table.ajax.reload();
        });

        enable_disable_parent();

        $('select[name=is_parent]').change(function () {
            enable_disable_parent();
        });

        $('input[name=display_name]').keyup(function(){
            str = this.value.replace(/\s+/g, '-').toLowerCase();
            $('input[name=name]').val(str);
            if ('' == $('select[name=parent]').val()) {
                $('input[name=pattern]').val(str);
            }
        });

        $('select[name=parent]').change(function() {
            var pattern = $(this).find(':selected').data('pattern');
            if ( '' == pattern) {
                pattern = $('input[name=name]').val();
            }
            $('input[name=pattern]').val(pattern)
        });
        
        if (($('input[name=display_name]').val() == '') && ($('input[name=position]').val() == '')) {
            getPossition();
        }
    });

    $(document).on('change', 'input[name=display_name], select[name=parent]', function() {
        getPossition()            
    });

    function getPossition()
    {
        $.ajax({
            url: "{{ route('admin.menu.possition') }}",
            type: 'GET',
            data: {
                parent_id : $('select[name=parent]').val(),
                is_parent : $('select[name=is_parent]').val()
            }
        }).success(function(res) {
            $('input[name=position]').val(res.data.position);
        });
    }
    
    /* Manage disable enable input filed */
    function enable_disable_parent() {
        if (0 == $('select[name=is_parent]').val()) {
            $('select[name=parent]').removeAttr('disabled');
        } else {
            $('select[name=parent]').attr('disabled', 'disabled');
        }
    }
</script>