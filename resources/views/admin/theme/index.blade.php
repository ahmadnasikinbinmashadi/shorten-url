@extends('backend::layouts.master')

@section('title', trans('backend::app.label.theme_management'))

@section('header')
<style type="text/css">
    .center-align {
        text-align: center;
    }
</style>
@endsection

@section('page-header', trans('backend::app.label.theme_management'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li class="active">{!! trans('backend::app.label.theme_management') !!}</li>
    </ol>
@endsection

@section('content')
@include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border">
                <div class="box-header with-border">
                    @include('backend::partial.dynamic_filter',['field_name' => $field_name])
                </div>
            </div>
        </div>
         <div class="box-body">
            <table id="themes-table"" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.theme.id') !!}</th>
                    <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.theme.name') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.theme.semester') !!}</th>
                    <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.theme.course') !!}</th>
                    <th class="center-align" width="10%">{!! trans('backend::app.table.head.title.theme.module') !!}</th>
                    <th class="center-align" width="10%">{!! trans('backend::app.table.head.title.theme.cover') !!}</th>
                    <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                    <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                    <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                    <th class="center-align">{!! trans('backend::app.table.head.title.publish_status') !!}</th>
                    <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.title.published_at') !!}</th>
                    <th class="center-align" style="min-width: 200px;">{!! trans('backend::app.table.head.title.action') !!}</th>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.theme.scripts.script');
    @include('backend::alert-delete')
@endsection