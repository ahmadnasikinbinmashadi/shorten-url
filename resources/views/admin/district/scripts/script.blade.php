<script type="text/javascript">
    $(document).ready(function($) {
        var district    =   $('#district-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax : '{{ route('datatables.district') }}',
                                columns: [
                                    {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable:false,sortable:false},
                                    {data: 'city_name', name: 'city_name' },
                                    {data: 'name', name: 'name' },
                                    {data: 'created_at', name: 'created_at' },
                                    {data: 'updated_at', name: 'updated_at' },
                                ]
                            });

        $('#btn-sync').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('admin.district.store') }}',
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