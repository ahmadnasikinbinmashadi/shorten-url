@extends('backend::layouts.master')

@section('title', trans('backend::app.label.education_management'))

@section('header')

@endsection

@section('page-header')
    {!! trans('backend::app.label.education_management') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.education_management') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['route' => ['admin.jenjang.store'], 'method' => 'POST','id' => 'education-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.education.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('id', $education_id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.education.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('education_name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('admin.jenjang.index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\EducationRequest') !!}
@endsection