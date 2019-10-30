<script type="text/javascript">
    $(document).ready(function($) {
        var theme_table =   $('#educations-table').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [[ 0, 'asc' ]],
                                ajax: {
                                    url: '{{ route('datatables.education') }}',
                                    data: function (element) {
                                        element.field_name = $('#field_name').val();
                                        element.operator = $('#operator').val();
                                        element.search = $('#search').val();
                                    }
                                },
                                columns: [
                                    {data: 'id', name: 'id' },
                                    {data: 'education_name', name: 'education_name' },
                                    {data: 'created_by', name: 'created_by' },
                                    {data: 'created_at', name: 'created_at' },
                                    {data: 'updated_by', name: 'updated_by' },
                                    {data: 'updated_at', name: 'updated_at' },
                                    {data: 'deleted_by', name: 'deleted_by' },
                                    {data: 'deleted_at', name: 'deleted_at' },
                                    {data: 'status_delete', name: 'status_delete' },
                                    {data: 'action', name: 'action',searchable:false, orderable:false },
                                ],
                                dom: 'Bfrtip',
                                buttons: [
                                    'excel'
                                ],
                                "searching": false
                            });

        $('#btn-search').on('click', function(e) {
            e.preventDefault();
            theme_table.draw();
        });
    });
</script>