@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_newsletter'))

@section('header')
    @include('backend::admin.module.styles.style')
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_newsletter') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_newsletter') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\NewsletterController@store'),'id' => 'newsletter-form', 'class' => 'form-horizontal','autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group{{ Form::hasError('title') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.newsletter.title') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-9">
                                {!! Form::text('title', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                                {!! Form::errorMsg('title') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('subject') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.newsletter.subject') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-9">
                                {!! Form::text('subject', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                                {!! Form::errorMsg('subject') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('content') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.newsletter.content') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('content', null, ['class' => 'form-control tinymce']) !!}
                                {!! Form::errorMsg('content') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ Form::hasError('newsletter_filter') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.newsletter.newsletter_filter') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::select('newsletter_filter', ['0' => 'Specific Customer', '1' => 'Custom Condition'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                {!! Form::button(trans('backend::app.button.show_recepient'), ['class' => 'btn btn-primary', 'id' => 'btn_show_user']) !!}
                            </div>
                            <div>
                                <table id="list-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                                    <thead>
                                        <tr>
                                            <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.newsletter.id') !!}</th>
                                            <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.newsletter.title') !!}</th>
                                            <th width="13%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\NewsletterController@index') }}" class="btn btn-default">
                            {!! trans('backend::app.button.back') !!} 
                        </a>

                        {!! Form::submit(trans('backend::app.button.save'), ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="modal-recepient">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {!! trans('backend::app.label.list_user') !!}
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <table id="abc-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                        <thead>
                            <tr>
                                <th class="center-align" style="min-width: 60px;"></th>
                                <th class="center-align" style="min-width: 60px;">{!! trans('backend::app.table.head.title.newsletter.id') !!}</th>
                                <th>{!! trans('backend::app.table.head.title.newsletter.fullname') !!}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('backend::admin.newsletter.scripts.create_script')
@endsection