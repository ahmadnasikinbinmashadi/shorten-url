<script>
	$(document).ready(function() {
        var url = "{!! route('admin.paket-soal.create') !!}";
		var table = $('#paket_soal_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\PaketSoalController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
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
                {
                    targets: 0,
                    render: function ( data, type, row ) {
                        if ( type === 'display' ) {
                            return '<div class="checkbox icheck"><label><input type="checkbox" name="ids" value="1" class="dt-checkboxes" data-id="'+row.id+'" data-status="'+row.published_at+'" data-delete="'+row.deleted_at+'"></label></div>';
                        }
                        return data;
                    },
                    className: "dt-body-center text-center"
                },
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
                {data: null, orderable: false, searchable: false},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name', searchable: true},
                {data: 'module', name: 'module'},
                {data: 'cover', name: 'cover'},
                {data: 'theme_soal', name: 'theme_soal'},
                {data: 'total_question', name: 'total_question'},
                {data: 'publisher', name: 'publisher'},
                {data: 'created_name', name: 'created_name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_name', name: 'updated_name'},
                {data: 'deleted_name', name: 'deleted_name'},
                {data: 'published_at', name: 'published_at'}
            ],
            order: [ [2, 'desc'] ],
            responsive: true,
            "scrollX": true,   // enables horizontal scrolling
            dom: 'lBfrtip',            
            buttons: [
                {
                    extend: 'collection',
                    text: 'Aksi&nbsp;<i class="fa fa-caret-down"></i>',
                    autoClose: true,
                    buttons: [
                        { text: '<i class="fa fa-arrow-circle-up"></i> {!! trans('backend::app.button.publish') !!}</a>', action: function () { 
                                publish(table);
                            } 
                        },
                        { text: '<i class="fa fa-arrow-circle-down"></i> {!! trans('backend::app.button.unpublish') !!}</a>',    action: function () { 
                                unPublish(table);
                            } 
                        },
                        { text: '<i class="fa fa-trash-o fa-fw"></i>{!! trans('backend::app.button.delete') !!}</a>',   action: function () { 
                                softDelete(table);
                            } 
                        },
                        { text: '<i class="fa fa-trash-o fa-fw"></i>{!! trans('backend::app.button.hard_delete') !!}</a>',   action: function () { 
                                hardDelete(table);
                            } 
                        },
                        { text: '<i class="fa fa-copy fa-fw"></i>{!! trans('backend::app.button.copy') !!}</a>',   action: function () { 
                                copy(table);
                            } 
                        }
                    ],
                    fade: true
                },
                {
                    extend: 'excel',
                    text: 'Export Excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    }
                }
            ]
        });
        
        $(".dt-buttons").css('margin-left', '10px');
        $("div.dataTables_length label").addClass('pull-left');

        table.on( 'draw', function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });

            $('#dt-checkboxes-select-all').on('ifClicked', function() {
                var chkToggle;
                $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
                $('input.dt-checkboxes').iCheck(chkToggle);
                
                hideShowBtn(chkToggle);
            });

            $('.dt-checkboxes').on('ifClicked', function() {
                var chkToggle;
                $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
                $(this).iCheck(chkToggle);
                
                if ($('.dt-checkboxes').filter(':checked').length > 0) {
                    $('a#btn_delete').removeClass('hidden');
                    $('a#btn_publish').removeClass('hidden');
                } else {
                    $('a#btn_delete').addClass('hidden');
                    $('a#btn_publish').addClass('hidden');
                }

                if (chkToggle == 'uncheck') {
                    $('input.dt-checkboxes-select-all').iCheck('uncheck');
                }

                if ($('.dt-checkboxes').filter(':checked').length == $('.dt-checkboxes').length) {
                    $('#dt-checkboxes-select-all').iCheck('check');
                }
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
                                url: '{!! route("admin.paket-soal.ajax-publish") !!}',
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
                                url: '{!! route("admin.paket-soal.ajax-unpublish") !!}',
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

        /* Memindahkan soal-soal ke paket lain */
        $('[data-tables=true]').on('click', '[data-button=move]', function(e) {
            e.preventDefault();
            var url = $(this).data('href');
            
            /* load the url and show modal on success */
            $('#modal-move .modal-body').load(url, function() {
                $('#modal-move').modal('show');
            })
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

    function hideShowBtn(chkToggle)
    {
        if (chkToggle == 'check') {
            $('a#btn_delete').removeClass('hidden');
            $('a#btn_publish').removeClass('hidden');
        } else {
            $('a#btn_delete').addClass('hidden');
            $('a#btn_publish').addClass('hidden');
        }
    }

    function publish(table)
    {
        var ids            = [];
        var publish_status = [];
        var delete_status = [];
        var url            = '{!! route("admin.paket-soal.ajax-multi-publish") !!}';
        var message        = "{!! trans('backend::app.message.question.multi_publish') !!}";

        table.$('input[type="checkbox"]').each(function(){
            if ($(this).is(':checked')) {
                ids.push($(this).data('id'));

                if($(this).data('status') != null) {
                    publish_status.push($(this).data('status'));
                }

                if($(this).data('delete') != null) {
                    delete_status.push($(this).data('delete'));
                }
            }
        });

        if(ids.length < 1) {
            validation('no_data', 'Paket soal');
            return false;
        }

        if(publish_status.length == ids.length) {
            validation('published', 'Paket soal');
            return false;
        }

        if(delete_status.length > 0) {
            validation('check_delete_before_action', 'Paket soal');
            return false;
        }

        // confirm and action unpublish
        confirmationAction(message, url, ids);
    }

    function unPublish(table)
    {
        var ids              = [];
        var unpublish_status = [];
        var delete_status    = [];
        var url              = '{!! route("admin.paket-soal.ajax-multi-unpublish") !!}';
        var message          = "{!! trans('backend::app.message.question.multi_unpublish') !!}";

        table.$('input[type="checkbox"]').each(function(){
            if ($(this).is(':checked')) {
                ids.push($(this).data('id'));

                if($(this).data('status') == null) {
                    unpublish_status.push($(this).data('status'));
                }

                if($(this).data('delete') != null) {
                    delete_status.push($(this).data('delete'));
                }
            }
        });

        if(ids.length < 1) {
            validation('no_data', 'Paket soal');
            return false;
        }

        if(delete_status.length > 0) {
            validation('check_delete_unpublish', 'Paket soal');
            return false;
        }

        if(unpublish_status.length == ids.length) {
            validation('unpublished', 'Paket soal');
            return false;
        }

        // confirm and action unpublish
        confirmationAction(message, url, ids);
    }

    function softDelete(table)
    {
        var ids           = [];
        var delete_status = [];
        var url           = '{!! route("admin.paket-soal.ajax-multi-soft-delete") !!}';
        var message       = "{!! trans('backend::app.message.question.multi_soft_delete') !!}";

        table.$('input[type="checkbox"]').each(function(){
            if ($(this).is(':checked')) {
                ids.push($(this).data('id'));

                if($(this).data('delete') != null) {
                    delete_status.push($(this).data('delete'));
                }
            }
        });

        if(ids.length < 1) {
            validation('no_data', 'Paket soal');
            return false;
        }

        if(delete_status.length == ids.length) {
            validation('deleted', 'Paket soal');
            return false;
        }
        
        // confirm and action delete
        confirmationAction(message, url, ids);
    }

    function hardDelete(table)
    {
        var ids           = [];
        var delete_status = [];
        var url           = '{!! route("admin.paket-soal.ajax-multi-hard-delete") !!}';
        var message       = "{!! trans('backend::app.message.question.multi_hard_delete') !!}";

        table.$('input[type="checkbox"]').each(function(){
            if ($(this).is(':checked')) {
                ids.push($(this).data('id'));

                if($(this).data('delete') == null) {
                    delete_status.push($(this).data('delete'));
                }
            }
        });

        if(ids.length < 1) {
            validation('no_data', 'Paket soal');
            return false;
        }

        if(delete_status.length > 0) {
            validation('not_deleted', 'Paket soal');
            return false;
        }
        
        // confirm and action delete
        confirmationAction(message, url, ids);
    }

    function copy(table)
    {
        var ids           = [];
        var delete_status = [];
        var url           = '{!! route("admin.paket-soal.multi-copy") !!}';
        var message       = "{!! trans('backend::app.message.question.multi_copy') !!}";

        table.$('input[type="checkbox"]').each(function(){
            if ($(this).is(':checked')) {
                ids.push($(this).data('id'));

                if($(this).data('delete') != null) {
                    delete_status.push($(this).data('delete'));
                }
            }
        });

        if(ids.length < 1) {
            validation('no_data', 'Paket soal');
            return false;
        }

        if(delete_status.length > 0) {
            validation('check_delete_copy', 'Paket soal');
            return false;
        }
        
        $('#ids').val(ids);
        $('#modal-copy').modal('show');
    }

    function validation(type, modelName)
    {
        switch(type) {
            case 'no_data':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.no_selected_data', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'published':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.already_published', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'unpublished':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.already_unpublished', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'deleted':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.already_deleted', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'not_deleted':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.not_deleted', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'check_delete_before_action':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.check_delete_publish', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'check_delete_unpublish':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.check_delete_unpublish', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'check_delete_copy':
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.check_delete_copy', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            default:
                $.alert({
                    title: 'Peringatan!',
                    content: "{!! trans('backend::app.message.validation.no_selected_data', ['model' => '"+ modelName +"']) !!}"
                });
       }
    }

    function confirmationAction(message, url, ids)
    {
        $.confirm({
            title: 'Konfirmasi',
            content: message,
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
                            url: url,
                            data: {
                                _token: "{!! csrf_token() !!}",
                                ids: ids
                            },
                            success: function(data) {
                                notification_messages(data.message, data.status);
                            }
                        });
                    }
                },
            }
        });
    }
</script>