@extends('backend::layouts.master')

@section('title', trans('backend::app.label.education_management'))

@section('header')
<style type="text/css">
    .center-align {
        text-align: center;
    }
</style>
@endsection

@section('page-header', trans('backend::app.label.education_management'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li class="active">{!! trans('backend::app.label.education_management') !!}</li>
    </ol>
@endsection

@section('content')
@include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border">
                <div class="box-header with-border">
                    @include('backend::partial.dynamic_filter',['field_name' => $field_name])
                    <div class="box-title pull-right">
                        <a class="btn btn-primary btn-sm" href="" title="" id="export"><i class="fa fa-download fa-fw"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.jenjang.create') }}">
                            <i class="fa fa-plus fa-fw"></i>
                            {{ trans('backend::app.button.add') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <div class="box-body">
            <table id="educations-table"" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <th class="center-align">{!! trans('backend::app.table.head.title.education.id') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.education.name') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.edited_at') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.deleted_at') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.status') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.action') !!}</th>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.education.scripts.script');
    @include('backend::alert-delete')
@endsection