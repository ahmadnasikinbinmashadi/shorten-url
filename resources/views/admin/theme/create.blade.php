@extends('backend::layouts.master')

@section('title', trans('backend::app.label.theme_management'))

@section('header')

@endsection

@section('page-header')
    {!! trans('backend::app.label.theme_management') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.theme_management') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['route' => ['admin.theme.store'], 'method' => 'POST','id' => 'theme-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.theme.id') !!}{!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('id', $theme_id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.theme.semester') !!}{!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('semester',['Ganjil' => 'Ganjil','Genap' => 'Genap'], [], ['class' => 'form-control','id' => 'semester','placeholder' => "Pilih Semester"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label" class="col-sm-3 control-label">
                            {{ trans('backend::app.label.module') }}
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-md-5">
                            {!! Form::select('module_id', $module, null, ['class' => 'form-control col-sm-11 number-only', 'id' => 'module', 'placeholder' => 'Pilih Module']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.theme.course') !!}{!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader"></div>
                            {!! Form::select('mata_pelajaran_id', [], [], ['class' => 'form-control','id' => 'school_subject','placeholder' => "Pilih Mata Pelajaran", 'disabled' => 'disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.theme.name') !!}{!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('theme_name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('admin.theme.index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ThemeRequest') !!}
    @include('backend::admin.theme.scripts.create_script')
@endsection