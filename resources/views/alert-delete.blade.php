<div id="delete-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{!! trans('backend::app.label.confirm') !!}</h4>
            </div>
            <div class="modal-body">
                <p>{!! trans('backend::app.message.question.delete') !!}</p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['id' => 'destroy', 'method' => 'DELETE']) !!}
                    <a id="delete-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">{!! trans('backend::app.button.cancel') !!}</a>&nbsp;
                    {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('[data-tables=true]').on('click', '[data-button=delete]', function(e) {
            var id = $(this).attr('data-id');
            $('#destroy').attr('action', '{{ URL::to(Request::getRequestUri()) }}/'+id);
            $('#delete-modal').modal('show');
            e.preventDefault();
        });
    });
</script>
