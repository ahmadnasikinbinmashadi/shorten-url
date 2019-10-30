@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_bank'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_bank'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\BankController@index') !!}">{!! trans('backend::app.label.master_bank') !!}</a></li>
    </ol>
@endsection

@section('content')
    @include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border" >
                @include('backend::partial.dynamic_filter',['field_name' => $field_name])
                <div class="box-title pull-right">
                    <div class="nav-top">
                        <a class="btn btn-primary btn-sm" href="" title="Refresh" id="refresh"><i class="fa fa-refresh fa-fw"></i></a>
                        
                            <a class="btn btn-primary btn-modal-form btn-create btn-sm" href="{{ action('Admin\BankController@create') }}" data-icon="fa fa-plus fa-fw" data-background="modal-primary"><i class="fa fa-plus fa-fw"></i>Add</a>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="banks-table" class="table table-bordered table-nowrap table-striped table-colored table-primary" width="100%" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">{!! trans('backend::app.table.head.title.bank.id') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.title.bank.name') !!}</th>
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
    @include('backend::admin.bank.scripts.script')
    @include('backend::alert-delete')
@endsection