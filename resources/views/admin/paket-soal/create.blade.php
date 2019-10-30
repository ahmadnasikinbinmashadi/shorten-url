@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_paket'))

@section('header')
    {!! Html::style('bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css') !!}
    @include('backend::admin.paket-soal.styles.style')
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_paket') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_paket') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\PaketSoalController@store'),'id' => 'paket-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('paket_id', $paket_id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('module_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.module') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader"></div>
                            {!! Form::select('module_id', $modules, null, ['class' => 'form-control', 'id' => 'module', 'placeholder' => 'Pilih Module']) !!}
                            {!! Form::errorMsg('module_id') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('subject_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.subject') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader-subject"></div>
                            {!! Form::select('subject_id', [], null, ['class' => 'form-control','id' => 'school_subject','placeholder' => "Pilih Mata Pelajaran", 'disabled' => 'disabled']) !!}
                            {!! Form::errorMsg('subject_id') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('theme_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.theme') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('theme_id', [], null, ['class' => 'form-control', 'placeholder' => 'Pilih Tema', 'disabled' => 'disabled', 'id' => 'theme']) !!}
                            {!! Form::errorMsg('theme_id') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('scoring_type') }}">
                        <label for="label" class="col-sm-3 control-label">
                            {{ trans('backend::app.label.scoring') }}
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label> 
                        <div class="col-md-5">
                            {!! Form::select('scoring_type', model_scoring(), null, ['class' => 'form-control col-sm-11', 'id' => 'scoring']) !!}
                            {!! Form::errorMsg('scoring_type') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label" class="col-sm-3 control-label">
                            {{ trans('backend::app.label.timer') }}
                        </label> 
                        <div class="col-md-5">
                            <label class="switch">
                              <input type="checkbox" name="is_timer" value="0">
                              <span class="slider round"></span>
                            </label>
                            {!! Form::errorMsg('is_timer') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('max_time') }}">
                        <label for="label" class="col-sm-3 control-label">
                            {{ trans('backend::app.label.max_time') }}
                        </label> 
                        <div class="col-md-5">
                            {!! Form::text('max_time', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            {!! Form::errorMsg('max_time') !!}
                        </div>
                        <label for="label" class="col-sm-3 control-label" style="text-align: left;">
                            {{ trans('backend::app.label.minutes') }}
                        </label> 
                    </div>
                    <div class="form-group{{ Form::hasError('trial') }}">
                        <label for="label" class="col-sm-3 control-label">
                            {{ trans('backend::app.label.trial') }}
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label> 
                        <div class="col-md-5">
                            {!! Form::select('trial', ['1' => 'YES', '0' => 'NO'], null, ['class' => 'form-control col-sm-11', 'id' => 'scoring']) !!}
                            {!! Form::errorMsg('trial') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\PaketSoalController@index') }}" class="btn btn-default">
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
    {!! Html::script('bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\PaketSoalRequest') !!}
    @include('backend::admin.paket-soal.scripts.create_script')
@endsection