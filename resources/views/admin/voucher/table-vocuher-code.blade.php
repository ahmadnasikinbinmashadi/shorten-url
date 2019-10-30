<!-- Modal List Vocuher Details -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {!! trans('backend::app.label.list-voucher-code') !!}
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="col-md-12" style="margin-bottom: 2%;">
                        <div class="form-group">   
                          {!! Form::label('name', trans('backend::app.table.head.title.voucher.name'), ['class' => 'col-sm-3 control-label']) !!}
                          <div class="col-md-8 name-view"> </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 2%;">
                        <div class="form-group">
                          {!! Form::label('session', trans('backend::app.table.head.title.voucher.session'), ['class' => 'col-sm-3 control-label']) !!}
                          <div class="col-md-8 session-view"></div>
                        </div>
                    </div>

                    <table id="voucher-code-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                        <thead>
                            <tr>
                                <th class="center-align" style="min-width: 60px;">{!! trans('backend::app.table.head.title.no') !!}</th>
                                <th>{!! trans('backend::app.table.head.title.voucher.voucher-code') !!}</th>
                                <th>{!! trans('backend::app.table.head.title.voucher.total-usage') !!}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('[data-tables=true]').on('click', '[data-button=detail]', function(e) {
            // Add value onto label
            $(this).parent().parent().parent().find('tr').removeClass('selected');
            $(this).parent().parent().toggleClass('selected');
            var id = $(this).data('id');
            var table = $('#voucher-table').DataTable();
            var voucher = $.map(table.rows('.selected').data(), function (item) {
                return item;
            });

            $('.name-view').text(': '+voucher[0].agent_name);
            $('.session-view').text(': '+voucher[0].session);

            $('#modal-detail').modal('show');
            e.preventDefault();
            
            // list datatable voucher code
            $('#modal-detail').on('shown.bs.modal', function () {
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
                
                $('#voucher-code-table').DataTable().destroy();
                $('#voucher-code-table').DataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{!! URL::to('datatable/datatables/voucher/detail-datatables') !!}"+'/'+id
                    },
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', nRow).html(index);
                    },
                    columns: [
                        {data: null, orderable: false, searchable: false, "sClass": "text-center"},
                        {data: 'voucher_code', name: 'voucher_code'},
                        {data: 'total_usage', name: 'total_usage', "sClass": "text-right",}
                    ],
                    order: [[ 1, 'asc' ]]
                } );
            });
        });
    }); 
</script>