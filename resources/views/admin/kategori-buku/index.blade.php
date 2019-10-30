@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_kateg_buku'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_kateg_buku'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\KatBukuController@index') !!}">{!! trans('backend::app.label.master_kateg_buku') !!}</a></li>
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
            <table id="kateg-buku-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.kategori_buku.id') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.kategori_buku.name') !!}</th>
                        <th class="center-align" style="min-width: 80px;">{!! trans('backend::app.table.head.title.kategori_buku.parent_id') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.kategori_buku.parent_name') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.created_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.created_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.edited_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.edited_at') !!}</th>
                        <th class="center-align" style="min-width: 150px;">{!! trans('backend::app.table.head.title.deleted_by') !!}</th>
                        <th class="center-align" style="min-width: 130px;">{!! trans('backend::app.table.head.title.deleted_at') !!}</th>
                        <th class="center-align" style="min-width: 100px;">{!! trans('backend::app.table.status') !!}</th>
                        <th width="12%">{!! trans ('backend::app.table.head.title.action')!!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.kategori-buku.scripts.script')
    @include('backend::alert-delete')
@endsection