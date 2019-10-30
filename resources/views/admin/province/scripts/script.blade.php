<script type="text/javascript">
    $(document).ready(function($) {
        var province    =   $('#province-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax : '{{ route('datatables.province') }}',
                                columns: [
                                    {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable:false,sortable:false},
                                    {data: 'name', name: 'name' },
                                    {data: 'created_at', name: 'created_at' },
                                    {data: 'updated_at', name: 'updated_at' },
                                ]
                            });

        $('#btn-sync').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('admin.province.store') }}',
                type: 'GET',
                beforeSend : function () {
                    HoldOn.open();
                },
                complete : function () {
                    HoldOn.close();
                },
            });
            
        });
    });
</script>