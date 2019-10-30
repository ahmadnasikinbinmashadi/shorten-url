@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_module'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_module'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\ModuleController@index') !!}">{!! trans('backend::app.label.master_module') !!}</a></li>
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
            <table id="module-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">
                            <div class="checkbox icheck">
                                <label>
                                    {{ Form::checkbox('check_all', 1, null, ['class' => 'dt-checkboxes-select-all', 'id' => 'dt-checkboxes-select-all']) }}
                                </label>
                            </div>
                        </th>
                        <th width="18%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.module.id') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.module.name') !!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.module.class') !!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.module.publisher') !!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.module.type') !!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.module.total_paket_soal') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.edited_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.deleted_at') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.published_at') !!}</th>
                        <th class="center-align" style="min-width: 60px;">{!! trans('backend::app.table.head.status') !!}</th>
                        <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.head.status_publish') !!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.module.scripts.script')
    @include('backend::alert-delete')
@endsection