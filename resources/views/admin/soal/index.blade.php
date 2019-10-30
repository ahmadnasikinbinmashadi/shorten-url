@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_soal'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_soal'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\SoalController@index') !!}">{!! trans('backend::app.label.master_soal') !!}</a></li>
    </ol>
@endsection

@section('content')
    @include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border" >
                <input type="hidden" name="paket_id" value="{{ $paket_id }}">
                @include('backend::partial.dynamic_filter',['field_name' => $field_name])
                <div class="box-title pull-right">
                    <div class="nav-top">
                        <a class="btn btn-primary btn-modal-form btn-create btn-sm" href="{{ action('Admin\PaketSoalController@index') }}" data-icon="fa fa-plus fa-fw" data-background="modal-primary">Lihat Paket Soal</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="soal-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    {{ Form::checkbox('check_all', 1, null, ['class' => 'dt-checkboxes-select-all', 'id' => 'dt-checkboxes-select-all']) }}
                                </label>
                            </div>
                        </th>
                        <th width="12%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.soal.id') !!}</th>
                        <th class="center-align" style="min-width: 330px;">{!! trans('backend::app.table.head.title.soal.question') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.soal.package') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.soal.topic') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.soal.subject') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.soal.module') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.soal.scripts.script')
    @include('backend::admin.soal.modal-delete')
@endsection
