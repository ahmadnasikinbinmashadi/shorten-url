<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            {!! Form::open(['url' => route('admin.user.change-password', $user), 'id' => 'form-reset-password', 'autocomplete' => 'off', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
            <div class="box-body">
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('password') }} has-feedback">
                        {!! Form::label('password', trans('backend::app.label.password'), ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            {!! Form::errorMsg('password') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('password_confirmation') }} has-feedback">
                        {!! Form::label('confirm_password', trans('backend::app.label.password_confirmation'), ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            {!! Form::errorMsg('password_confirmation') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <a id="modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">{!! trans('backend::app.button.cancel') !!}</a>
                    {!! Form::submit(trans('backend::app.button.update'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ChangePasswordRequest') !!}