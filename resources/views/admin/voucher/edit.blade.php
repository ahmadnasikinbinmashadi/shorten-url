@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_voucher'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_voucher') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_voucher') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\VoucherController@update', $voucher->id),'id' => 'voucher-form', 'class' => 'form-horizontal','autocomplete' => 'off', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('agent_name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('agent_name', $voucher->agent_name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('agent_name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('agent_as') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.initial_agent') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('agent_as', $voucher->agent_as, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('agent_as') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('session') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.session') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('session', $voucher->session, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('session') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('voucher_value') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.value') !!} {!! trans('backend::app.label.mandatory_icon') !!} </label>
                        <div class="col-sm-4">
                            {!! Form::number('voucher_value', $voucher->voucher_value, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('voucher_value') !!}
                        </div>
                        <div><h4>%</h4></div>
                    </div>
                    <div class="form-group{{ Form::hasError('incentive') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.incentive') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::number('incentive', $voucher->incentive, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('incentive') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('type') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.type') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('type', ['' => 'NONE','unique' => 'UNIQUE', 'multi' => 'MULTI'], $voucher->type, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('type') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('start_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.start_at') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class='input-group date' id='datetimepicker1' data-date="{{ (isset($voucher->start_at) ? $voucher->start_at : '') }}">
                                <input type='text' name="start_at" value="{{ $voucher->start_at }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('start_at') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('expire_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.expire_at') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class='input-group date' id='datetimepicker2' data-date="{{ (isset($voucher->expire_at) ? $voucher->expire_at : '') }}">
                                <input type='text' name="expire_at" value="{{ $voucher->expire_at }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('expire_at') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('total') }}" id="box-total">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.total') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::number('total', $voucher->total, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('total') !!}
                        </div>
                    </div>

                    <div class="form-group{{ Form::hasError('voucher_code') }}" id="box-voucher-code">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.voucher-code') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('voucher_code', $voucher->voucher_code, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('voucher_code') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\VoucherController@index') }}" class="btn btn-default">
                            {!! trans('backend::app.button.back') !!} 
                        </a>
                        {!! Form::submit(trans('backend::app.button.save'), ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var start_date = $('#datetimepicker1').data('date');
            var end_date = $('#datetimepicker2').data('date');
            $('#datetimepicker1').datetimepicker({
                defaultDate: start_date,
                format: 'YYYY-MM-DD LT'
            });
            $('#datetimepicker2').datetimepicker({
                defaultDate: end_date,
                format: 'YYYY-MM-DD LT'
            });

            var voucher_type = $('select[name=type] option:selected').val();
            showHide(voucher_type);

            $('select[name=type]').on('change', function() {
                var type = $(this).val();
                showHide(type);
            });
        });

        function showHide(type)
        {
            if(type == 'multi') {
                $('#box-total').hide();
                $('input[name=total]').val(0);
                $('#box-voucher-code').show();

                $('span#voucher_code-error').html('');
                $('#box-voucher-code').removeClass('has-error');
                $('#box-voucher-code').removeClass('has-success');
            } else {
                $('#box-voucher-code').hide();
                $('input[name=voucher_code]').val(null);
                $('#box-total').show();

                $('span#total-error').html('');
                $('#box-total').removeClass('has-error');
                $('#box-total').removeClass('has-success');
            }
        }
    </script>
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\VoucherRequest') !!}
@endsection