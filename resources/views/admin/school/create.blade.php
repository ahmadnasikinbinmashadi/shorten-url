@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_school'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_school') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_school') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\ModuleController@store'),'id' => 'model-soal-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">

                    <div class="form-group{{ Form::hasError('region') }}">
                        <label class="col-md-3 control-label">Wilayah</label>
                        <div class="col-sm-5">
                            {!! Form::select('region', $school_region, [], ['class' => 'form-control','id' => 'find-region','placeholder' => '- Pilih Wilayah -']) !!}
                            {!! Form::errorMsg('region') !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('admin.school.index') }}" class="btn btn-default">
                            {!! trans('backend::app.button.back') !!} 
                        </a>

                        <a href="#" class="btn btn-primary" id="btn-find-school">
                            <span class="fa fa-refresh"></span> Syncronize
                        </a>
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('backend::admin.school.scripts.script')
@endsection