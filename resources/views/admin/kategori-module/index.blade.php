@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_kateg_module'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_kateg_module'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\KategModuleController@index') !!}">{!! trans('backend::app.label.master_kateg_module') !!}</a></li>
    </ol>
@endsection

@section('content')
    @include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border" >
                @include('backend::partial.dynamic_filter',['field_name' => $field_name])
            </div>
        </div>

        <div class="box-body">
            <table id="kateg-module-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">{!! trans('backend::app.table.head.title.kateg_module.id') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.kateg_module.name') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.edited_at') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.deleted_at') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.status') !!}</th>
                        <th width="12%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.kategori-module.scripts.script')
    @include('backend::alert-delete')
@endsection