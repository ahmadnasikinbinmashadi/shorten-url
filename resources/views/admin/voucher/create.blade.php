@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_voucher'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_voucher') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_voucher') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\VoucherController@store'),'id' => 'voucher-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">
                    @if( Session::has( 'error' ))
                        <p class="alert alert-danger text-center">{{ Session::get( 'error' ) }}</p>
                    @endif

                    @if ($errors->any())
                        <div class="col-md-12">
                            <div class="callout callout-danger">
                               <ul>
                                    @foreach($errors->all() as $error)
                                        @if(is_array($error))
                                            @foreach($error as $err)
                                               <li>{{$err}}</li>
                                            @endforeach
                                        @else      
                                            <li>{{$error}}</li>
                                        @endif
                                    @endforeach          
                                </ul>
                            </div>
                        </div>
                     @endif

                    <div class="form-group{{ Form::hasError('agent_name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('agent_name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('agent_name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('agent_as') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.initial_agent') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('agent_as', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('agent_as') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('session') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.session') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('session', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('session') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('voucher_value') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.value') !!} {!! trans('backend::app.label.mandatory_icon') !!} </label>
                        <div class="col-sm-4">
                            {!! Form::number('voucher_value', null, ['class' => 'form-control number-only']) !!}
                            {!! Form::errorMsg('voucher_value') !!}
                        </div>
                        <div><h4>%</h4></div>
                    </div>
                    <div class="form-group{{ Form::hasError('incentive') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.incentive') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::number('incentive', null, ['class' => 'form-control number-only']) !!}
                            {!! Form::errorMsg('incentive') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('type') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.type') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('type', ['' => 'NONE','unique' => 'UNIQUE', 'multi' => 'MULTI'], null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('type') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('start_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.start_at') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class='input-group datetimepicker date' id='datetimepicker1'>
                                <input type='text' name="start_at" value="" class="form-control" />
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
                            <div class='input-group datetimepicker date' id='datetimepicker2'>
                                <input type='text' name="expire_at" value="" class="form-control" />
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
                            {!! Form::number('total', null, ['class' => 'form-control number-only']) !!}
                            {!! Form::errorMsg('total') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('voucher_code') }}" id="box-voucher-code" style="display: none;">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.voucher-code') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('voucher_code', null, ['class' => 'form-control']) !!}
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\VoucherRequest') !!}
    @include('backend::admin.voucher.scripts.create_script')
@endsection