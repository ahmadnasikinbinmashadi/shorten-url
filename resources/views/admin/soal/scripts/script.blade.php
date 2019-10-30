<script>
    $(document).ready(function() {
        var table = $('#soal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! action('Admin\SoalController@datatables') !!}',
                "data": function(data) {
                    data.field_name = $('#field_name option:selected').val();
                    data.operator = $('#operator option:selected').val();
                    data.filter_value = $('#search').val();
                    data.package = $('input[name=paket_id]').val();
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
                            return '<div class="checkbox icheck"><label><input type="checkbox" name="ids" value="1" class="dt-checkboxes" data-id="'+row.id+'" data-delete="'+row.deleted_at+'"></label></div>';
                        }
                        return data;
                    },
                    className: "dt-body-center text-center"
                },
                {
                    targets: 3,
                    render: function ( data, type, row ) {
                        if(data != null) {
                            if(data.includes("<head>") == true) {
                                return data;
                            } else {
                                return type === 'display' && data.length > 100 ?
                                    data.substr( 0, 200 ) +'…' :
                                    data;
                            }
                        } else {
                            return data;
                        }
                    }
                }
            ],
            order: [ [9, 'desc'] ],
            columns: [
                {data: null, searchable: false, orderable: false},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false},
                {data: 'id', name: 'id'},
                {data: 'pertanyaan', name: 'pertanyaan'},
                {data: 'package', name: 'package'},
                {data: 'topic', name: 'topic'},
                {data: 'subject', name: 'subject'},
                {data: 'module', name: 'module'},
                {data: 'created_name', name: 'created_name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_name', name: 'updated_name'},
                {data: 'deleted_name', name: 'deleted_name'}
            ],
            responsive: true,
            "scrollX": true,   // enables horizontal scrolling
            dom: 'lBfrtip',            
            buttons: [
                {
                    extend: 'collection',
                    text: 'Aksi&nbsp;<i class="fa fa-caret-down"></i>',
                    autoClose: true,
                    buttons: [
                        { text: '<i class="fa fa-trash-o fa-fw"></i>{!! trans('backend::app.button.delete') !!}</a>',   action: function () { 
                                softDelete(table);
                            } 
                        },
                        { text: '<i class="fa fa-trash-o fa-fw"></i>{!! trans('backend::app.button.hard_delete') !!}</a>',   action: function () { 
                                hardDelete(table);
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
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
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

        $('#btn-search').on('click', function() {
            event.preventDefault();
            table.ajax.reload();
        });
    });

    function toArray(obj)
    {
        var array = Object.keys(obj).map(function(key) {
            return [Number(key), obj[key]];
        });
        return array;
    }

    function softDelete(table)
    {
        var ids           = [];
        var delete_status = [];
        var url           = '{!! route("admin.soal.ajax-multi-soft-delete") !!}';
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
            validation('no_data', 'Soal');
            return false;
        }

        if(delete_status.length == ids.length) {
            validation('deleted', 'Soal');
            return false;
        }
        
        // confirm and action delete
        confirmationAction(message, url, ids);
    }

    function hardDelete(table)
    {
        var ids           = [];
        var delete_status = [];
        var url           = '{!! route("admin.soal.ajax-multi-hard-delete") !!}';
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
            validation('no_data', 'Soal');
            return false;
        }

        if(delete_status.length > 0) {
            validation('not_deleted', 'Soal');
            return false;
        }
        
        // confirm and action delete
        confirmationAction(message, url, ids);
    }

    function validation(type, modelName)
    {
        switch(type) {
            case 'no_data':
                $.alert({
                    title: 'Warning!',
                    content: "{!! trans('backend::app.message.validation.no_selected_data', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'published':
                $.alert({
                    title: 'Warning!',
                    content: "{!! trans('backend::app.message.validation.already_published', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'unpublished':
                $.alert({
                    title: 'Warning!',
                    content: "{!! trans('backend::app.message.validation.already_unpublished', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'deleted':
                $.alert({
                    title: 'Warning!',
                    content: "{!! trans('backend::app.message.validation.already_deleted', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            case 'not_deleted':
                $.alert({
                    title: 'Warning!',
                    content: "{!! trans('backend::app.message.validation.not_deleted', ['model' => '"+ modelName +"']) !!}"
                });
                break;
            default:
                $.alert({
                    title: 'Warning!',
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
</script>
