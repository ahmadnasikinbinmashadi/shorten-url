<script type="text/javascript">
    $(document).ready(function($) {
        var theme_table =   $('#themes-table').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [[ 0, 'asc' ]],
                                ajax: {
                                    url: '{{ route('datatables.theme') }}',
                                    data: function (element) {
                                        element.field_name = $('#field_name').val();
                                        element.operator = $('#operator').val();
                                        element.filter_value = $('#search').val();
                                    }
                                },
                                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                                    if ( aData.deleted_at != null )
                                    {
                                        $('td', nRow).css('background-color', '#f2dede');
                                    }
                                },
                                "columnDefs": [ 
                                    {
                                        targets: 5,
                                        render: function ( data, type, row ) {
                                            if(data != null) {
                                                return '<img style="height:49px; width:49px;" src="{!! get_media_url('module/thumb', "'+data+'") !!}"/>';
                                            } else {
                                                return data;
                                            }
                                        }
                                    },
                                    {"className": "text-center", "targets": 5}
                                ],
                                columns: [
                                    {data: 'id', name: 'id'},
                                    {data: 'theme_name', name: 'theme_name'},
                                    {data: 'semester', name: 'semester' },
                                    {data: 'subject_school', name:'mata_pelajarans.name'},
                                    {data: 'module', name: 'module'},
                                    {data: 'cover', name: 'cover'},
                                    {data: 'created_name', name: 'created_user.fullname'},
                                    {data: 'updated_name', name: 'updated_user.fullname'},
                                    {data: 'deleted_name', name: 'deleted_user.fullname'},
                                    {data: 'is_publish', name: 'is_publish' },
                                    {data: 'published_at', name: 'published_at'},
                                    {data: 'action', name: 'action',searchable:false, orderable:false },
                                ],
                                "searching": false,
                                responsive: true,
                                "scrollX": true,   // enables horizontal scrolling
                            });

        $('#btn-search').on('click', function(e) {
            theme_table.draw();
            e.preventDefault();
        });

        /* Reload*/
        $('#refresh').on('click', function(event){
            event.preventDefault();
            // clear filter
            clear_filter_data();
            // reload datatable
            theme_table.ajax.reload();
        });

        // publish paket soal
        $('[data-tables=true]').on('click', '[data-button=publish]', function(e) {
            var id = $(this).attr('data-id');
            $.confirm({
                title: 'Konfirmasi',
                content: 'Apakah anda yakin mau mempublish data ini?',
                type: 'custom',
                buttons: {
                    no: {
                        text: 'BATAL',
                        keys: ['N'],
                        action: function () {
                        }
                    },
                    yes: {
                        text: 'IYA',
                        btnClass: 'btn-blue',
                        keys: ['y'],
                        action: function () {
                            $.ajax({
                                type: 'POST',
                                url: '{!! route("admin.theme.ajax-publish") !!}',
                                data: {
                                    _token: "{!! csrf_token() !!}",
                                    id: id
                                },
                                success: function(data) {
                                    notification_messages(data.message, data.status);
                                }
                            });
                        }
                    },
                }
            });
        });

        // Unpublish paket soal
        $('[data-tables=true]').on('click', '[data-button=unpublish]', function(e) {
            var id = $(this).attr('data-id');
            $.confirm({
                title: 'Konfirmasi',
                content: 'Apakah anda yakin mau me unpublish data ini?',
                type: 'custom',
                buttons: {
                    no: {
                        text: 'BATAL',
                        keys: ['N'],
                        action: function () {
                        }
                    },
                    yes: {
                        text: 'IYA',
                        btnClass: 'btn-blue',
                        keys: ['y'],
                        action: function () {
                            $.ajax({
                                type: 'POST',
                                url: '{!! route("admin.theme.ajax-unpublish") !!}',
                                data: {
                                    _token: "{!! csrf_token() !!}",
                                    id: id
                                },
                                success: function(data) {
                                    notification_messages(data.message, data.status);
                                }
                            });
                        }
                    },
                }
            });
        });
    });

    function notification_messages(message, type) {
        var type_status = "Failed!";

        if(type == "success"){ 
            type_status = "Success!";
        }

        if($.isArray(message)) {
            var flash_message = '';
            for (var i = 0; i < message.length; i++) {
                flash_message = flash_message + message[i];
            };
        }else{
            flash_message = message;
        }

        $.confirm({
            title: type_status,
            content: flash_message,
            type: 'custom',
            buttons: {
                confirm: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        if (type == "success" ) {
                            $('#refresh').trigger('click');
                        }
                    }
                }
            }
        });
    }
</script>