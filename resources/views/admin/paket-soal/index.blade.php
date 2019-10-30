@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_paket'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_paket'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\PaketSoalController@index') !!}">{!! trans('backend::app.label.master_paket') !!}</a></li>
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
            <table id="paket_soal_table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    {{ Form::checkbox('check_all', 1, null, ['class' => 'dt-checkboxes-select-all', 'id' => 'dt-checkboxes-select-all']) }}
                                </label>
                            </div>
                        </th>
                        <th width="35%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.paket.id') !!}</th> 
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.paket.name') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.paket.module') !!}</th>
                        <th class="center-align" style="min-width: 70px;">{!! trans('backend::app.table.head.title.paket.cover') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.paket.theme') !!}</th>
                        <th class="center-align" style="min-width: 70px;">{!! trans('backend::app.table.head.title.paket.total_soal') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.paket.publisher') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.published_at') !!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.paket-soal.scripts.script')
    @include('backend::alert-delete')
    @include('backend::admin.soal.modal-import')
    @include('backend::admin.paket-soal.modal-copy')
    @include('backend::admin.paket-soal.modal-move')
@endsection