@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_faq'))

@section('header')
    @include('backend::admin.module.styles.style')
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_faq') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_faq') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.faq.update', $faq), 'id' => 'faq-form', 'class' => 'form-horizontal','autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.faq_name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::text('name', $faq->name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('meta_title') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.meta_title') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::text('meta_title', $faq->meta_title, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('meta_title') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('meta_keyword') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.meta_keyword') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::text('meta_keyword', $faq->meta_keyword, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('meta_keyword') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('meta_description') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.meta_description') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::text('meta_description', $faq->meta_description, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('meta_description') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('faq_group_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.faq_group') !!}</label>
                        <div class="col-sm-4">
                            {!! Form::select('faq_group_id', $groups, $faq->faq_group_id, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('faq_group_id') !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::button(trans('backend::app.button.add_group'), ['class' => 'btn btn-primary', 'id' => 'add_group']) !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('description') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.faq.description') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::textarea('description', $faq->description, ['class' => 'form-control tinymce']) !!}
                            {!! Form::errorMsg('description') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\FaqController@index') }}" class="btn btn-default">
                            {!! trans('backend::app.button.back') !!} 
                        </a>

                        {!! Form::submit(trans('backend::app.button.save'), ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@include('backend::admin.faq.modal_add_group')
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\FaqRequest') !!}
    @include('backend::admin.faq.scripts.create_script')
@endsection