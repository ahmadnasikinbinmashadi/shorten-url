<script type="text/javascript">
    $(document).ready(function($) {
        var school_local    =   $('#school-local-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax : '{{ route('datatables.school') }}',
                                columns: [
                                    {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable:false,sortable:false},
                                    {data: 'school_name', name: 'school_name' },
                                    {data: 'school_status', name: 'school_status' },
                                    {data: 'school_address', name: 'school_address' },
                                    {data: 'province_name', name: 'province_name' },
                                    {data: 'city_name', name: 'city_name' },
                                    {data: 'district_name', name: 'district_name' },
                                    {data: 'is_active', name: 'is_active' }
                                ],
                                order: [[ 3, 'asc' ]],

                            });


        $('#find-region').select2({
            ajax: {
                url: '{{ route('admin.school.findRegion') }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term,
                    }
                },
                processResults: function (data) {
                    return {
                            results: $.map(data, function(item) {
                                return { id: item.code, text: item.name };
                            })
                        };
                },
                cache: true
            },
            minimumInputLength: 2,
        });



        $('#btn-find-school').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('admin.school.store') }}',
                type: 'GET',
                data: { 
                    code : $('#find-region').val()
                },
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