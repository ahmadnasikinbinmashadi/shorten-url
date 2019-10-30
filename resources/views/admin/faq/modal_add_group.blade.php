<div class="modal fade" id="add-group-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {!! trans('backend::app.label.add_group') !!}
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => action('Admin\FaqController@addGroup'), 'id' => 'form-add-group', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('group_name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.label.group_name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-md-6">
                            {!! Form::text('group_name', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('group_name') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cancel" data-dismiss="modal" class="btn btn-default">{!! trans('backend::app.button.cancel') !!}</button>
                <button type="button" id="btn-save-group" class="btn btn-primary">{!! trans('backend::app.button.save') !!}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>